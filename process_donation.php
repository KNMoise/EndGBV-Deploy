<?php
header('Content-Type: application/json');

// Include the Stripe and PayPal SDKs via Composer
require 'vendor/autoload.php';
require 'config.php';
require 'admin_pages/includes/db.php';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Get donation data from request
$data = json_decode(file_get_contents('php://input'), true);

$first_name = htmlspecialchars($data['firstName']);
$last_name = htmlspecialchars($data['lastName']);
$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$amount = (float) $data['amount'];
$is_monthly = $data['isMonthly'] ? 1 : 0;
$payment_method = $data['paymentMethod'];

// Payment Processing
if ($payment_method === 'card') {
    // Initialize Stripe SDK
    \Stripe\Stripe::setApiKey('pk_test_51PEuv1RpuOpFQB4xFh9TFy52cZhDVZSrGLNr92pYBohyh5oLi60hEy4E2nGndEj6xD9fg82sUfWEBH4fNrPcuIQG00zPDpjWgu');
    // Replace with your Stripe secret key

    try {
        $charge = \Stripe\Charge::create([
            'amount' => $amount * 100,  // Convert to cents
            'currency' => 'usd',
            'source' => $data['cardToken'],  // Token generated via Stripe.js
            'description' => 'Donation',
        ]);
    } catch (Exception $e) {
        die(json_encode(['error' => 'Payment failed: ' . $e->getMessage()]));
    }
} else if ($payment_method === 'paypal') {
    // Create a new payment request
    $payer = new PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $amountObj = new PayPal\Api\Amount();
    $amountObj->setTotal($amount);
    $amountObj->setCurrency('USD');

    $transaction = new PayPal\Api\Transaction();
    $transaction->setAmount($amountObj);
    $transaction->setDescription('Donation to your organization');

    $redirectUrls = new PayPal\Api\RedirectUrls();
    $redirectUrls->setReturnUrl("https://your-website.com/success.php")
        ->setCancelUrl("https://your-website.com/cancel.php");

    $payment = new PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);

    try {
        // Create the payment on PayPal's servers
        $payment->create($paypal);

        // Redirect the user to PayPal to approve the payment
        echo json_encode(['redirect_url' => $payment->getApprovalLink()]);
    } catch (Exception $e) {
        // Handle error
        die(json_encode(['error' => 'PayPal payment creation failed']));
    }
}

// Store the donation details in the database
$stmt = $pdo->prepare("INSERT INTO donations (first_name, last_name, email, amount, is_monthly, payment_method)
    VALUES (:first_name, :last_name, :email, :amount, :is_monthly, :payment_method)");

$stmt->execute([
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':email' => $email,
    ':amount' => $amount,
    ':is_monthly' => $is_monthly,
    ':payment_method' => $payment_method,
]);

// Send confirmation email to the donor
$to = $email;
$subject = 'Donation Confirmation';
$message = "Dear $first_name $last_name,\n\nThank you for your generous donation of $amount.\n\nBest regards,\nThe Team";
$headers = 'From: no-reply@endgbviolence.org';

if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Email sending failed']);
}
?>
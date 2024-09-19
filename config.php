<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$stripeSecretKey = getenv('STRIPE_SECRET_KEY');

// PayPal configuration 
$paypal = new ApiContext(
    new OAuthTokenCredential(
        getenv('PAYPAL_CLIENT_ID'),    
        getenv('PAYPAL_SECRET')        
    )
);

// Set PayPal mode to 'live' for production or 'sandbox' for testing
$paypal->setConfig([
    'mode' => 'live', // Use 'live' for production and 'sandbox' for testing
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => '/path/to/log/file.log',
    'log.LogLevel' => 'INFO', // Use 'FINE', 'INFO', 'WARN', or 'ERROR'
    'validation.level' => 'log'
]);
?>

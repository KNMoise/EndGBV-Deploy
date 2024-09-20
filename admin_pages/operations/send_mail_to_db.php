<?php
require '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400); // Bad request
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400); // Bad request
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit();
    }

    // Insert into the database using prepared statements
    $sql = "INSERT INTO emails (sender_names, sender_email, subject, message, date_sent) 
            VALUES (?, ?, ?, ?, CURDATE())";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            http_response_code(200); // OK
            echo json_encode(['status' => 'success', 'message' => 'Message sent and stored in the database successfully!']);
        } else {
            http_response_code(500); // Internal server error
            echo json_encode(['status' => 'error', 'message' => 'Failed to save message to the database.']);
        }

        $stmt->close();
    } else {
        http_response_code(500); // Internal server error
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
    }

    $conn->close();
} else {
    http_response_code(405); // Method not allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>

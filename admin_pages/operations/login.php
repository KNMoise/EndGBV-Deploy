<?php
session_start();
require '../includes/db.php';

// Sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database for the user
$query = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND username='$username'");
$row = mysqli_fetch_array($query);
$num_row = mysqli_num_rows($query);

// Check if a user is found
if ($num_row > 0) {
    // Store user ID in session
    $_SESSION['user_id'] = $row['user_id'];

    // Retrieve the positions field
    $positions = $row['positions'];

    // Debugging: print out the positions value (optional, remove in production)
    if (empty($positions)) {
        echo 'Debug: Positions field is empty or undefined.';
    } else {
        echo 'Debug: Positions value is "' . $positions . '"<br>';
    }

    // Redirect based on the user's positions
    if ($positions == 'doctor') {
        header('Location: ../doctor.php');
    } elseif ($positions == 'admin') {
        header('Location: ../dashboard.php');
    } elseif ($positions == 'lawyer') {
        header('Location: ../lawyer.php');
    } elseif ($positions == 'psychologist') {
        header('Location: ../counseling.php');
    } else {
        echo 'Invalid positions or unknown role. Please contact system administrator.';
    }

    exit(); // Stop further execution
} else {
    // Invalid login attempt
    echo 'Invalid Username and Password Combination';
}
?>

<?php 
session_start();
require '../includes/db.php';

// Sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database for the user
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_array($query);
$num_row = mysqli_num_rows($query);

if ($num_row > 0) {
    // Check if password matches
    if ($row['password'] == $password) {
        $_SESSION['user_id'] = $row['user_id'];

        // Retrieve positions field
        $positions = $row['positions'];

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
        echo 'Invalid Username and Password Combination (Password does not match)';
    }
} else {
    echo 'Invalid Username and Password Combination (No user found)';
}
?>

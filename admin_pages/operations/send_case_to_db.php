<?php
session_start();
require '../includes/db.php';

// Function to generate a random file name
function generateRandomFileName($extension) {
    return uniqid() . '.' . $extension;
}

// Sanitize and capture form data
$names = mysqli_real_escape_string($conn, $_POST['names']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$marriage_status = mysqli_real_escape_string($conn, $_POST['marriage-status']);
$education_level = mysqli_real_escape_string($conn, $_POST['education-level']);
$religion_beliefs = mysqli_real_escape_string($conn, $_POST['religion-beliefs']);
$display_name = mysqli_real_escape_string($conn, $_POST['display-name']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$case_type = mysqli_real_escape_string($conn, $_POST['case-type']);
$case_overview = mysqli_real_escape_string($conn, $_POST['case-overview']);
$assistance_suggestion = mysqli_real_escape_string($conn, $_POST['assistance-suggestion']);

// File upload handling
$target_dir = "../casesDoc/";
$uploadOk = 1;
$maxFileSize = 10 * 1024 * 1024; // 10MB
$allowedFileTypes = ['jpg', 'jpeg', 'png', 'pdf', 'txt'];

if(isset($_FILES["attachments"])) {
    $file_name = $_FILES["attachments"]["name"];
    $file_tmp = $_FILES["attachments"]["tmp_name"];
    $file_size = $_FILES["attachments"]["size"];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Check file extension
    if(!in_array($file_ext, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, PDF, and TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check file size
    if($file_size > $maxFileSize) {
        echo "Sorry, your file is too large. Maximum size is 10MB.";
        $uploadOk = 0;
    }

    // Proceed if everything is OK
    if ($uploadOk == 1) {
        // Generate a random file name
        $new_file_name = generateRandomFileName($file_ext);
        $target_file = $target_dir . $new_file_name;

        // Move the file to the uploads directory
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "The file has been uploaded.";

            // Insert data into the correct table (case_submissions)
            $sql = "INSERT INTO case_submissions (names, gender, marriage_status, education_level, religion_beliefs, display_name, residence, phone, email, case_type, case_overview, assistance_suggestion, attachments)
                    VALUES ('$names', '$gender', '$marriage_status', '$education_level', '$religion_beliefs', '$display_name', '$residence', '$phone', '$email', '$case_type', '$case_overview', '$assistance_suggestion', '$new_file_name')";

            if (mysqli_query($conn, $sql)) {
                header('Location: ../thank_you.php');
            } else {
                echo "Error submitting case: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Sorry, there was an error uploading your file: $file_name<br>";
}
$attachments_json = json_encode($file_names);

mysqli_close($conn);


<?php 

require '../includes/db.php';

if (isset($_POST['save_team'])) {


    //get other inputs data

    $names = mysqli_escape_string($conn, $_POST['names']);
    $position = mysqli_escape_string($conn, $_POST['position']);
    $instagram = mysqli_escape_string($conn, $_POST['instagram']);
    $twitter = mysqli_escape_string($conn, $_POST['twitter']);
    $email = mysqli_escape_string($conn, $_POST['email']); 


    //Directory Where To Store Uploaded Images
    $targetDir = "../assets/img/frontend_images/";
    
    // Generate a new unique filename for the image
    $newFileName = uniqid() . "_" . $_FILES["fileToUpload"]["name"];
    // Get the original name of the uploaded file
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); 
    // Create the path for the renamed file
    $newFilePath = $targetDir . $newFileName;

    // Check if the file is a valid image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedExtensions = array("jpg", "jpeg", "png");
    if (!in_array($imageFileType, $allowedExtensions)) {
        header("location: ../client_side_pages.php?error=error=wrongimagetype");
    }else{

        if (empty($names) || empty($position) || empty($instagram) || empty($twitter) || empty($email)) {
            header("location: ../client_side_pages.php?error=teamnodata");
        }else{
            $query = "INSERT INTO team(names, position, image_url, instagram_url, twitter_url, email) VALUES('$names', '$position', '$newFileName',  '$instagram', '$twitter', '$email');";
            $query2 = mysqli_query($conn, $query);
            if ($query2) {

                // Move the uploaded file to the target directory with the new name
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);
               header("location: ../client_side_pages.php?error=teamsuccess");
            }
        }
    }    
}




 ?>
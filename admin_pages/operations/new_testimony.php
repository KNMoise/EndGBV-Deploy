<?php 

require '../includes/db.php';

if (isset($_POST['save_testimony'])) {


    //get other inputs data

    $testimonial_name = mysqli_escape_string($conn, $_POST['testimonial_name']);
    $testimonial_company = mysqli_escape_string($conn, $_POST['testimonial_company']);
    $testimony = mysqli_escape_string($conn, $_POST['testimony']);


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

        if (empty($testimonial_name) || empty($testimonial_company) || empty($testimony)) {
            header("location: ../client_side_pages.php?error=testimonynodata");
        }else{
            $query = "INSERT INTO testimonials(testimonial_name, company, testimony, image_url) VALUES('$testimonial_name', '$testimonial_company', '$testimony', '$newFileName');";
            $query2 = mysqli_query($conn, $query);
            if ($query2) {

                // Move the uploaded file to the target directory with the new name
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);
                header("location: ../client_side_pages.php?error=testimonysuccess");
            }
        }
    }    
}


















 ?>
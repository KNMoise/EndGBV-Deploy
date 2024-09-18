<?php 

require '../includes/db.php';

if (isset($_POST['save_portfolio'])) {


    //get other inputs data

    $port_title = mysqli_escape_string($conn, $_POST['port_title']);
    $port_subtitle = mysqli_escape_string($conn, $_POST['port_subtitle']);
    $category = mysqli_escape_string($conn, $_POST['category']);


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

        if (empty($port_title) || empty($port_subtitle)) {
            header("location: ../client_side_pages.php?error=portfolionodata");
        }else{
            $query = "INSERT INTO portfolio(title, sub_title, category, image_url) VALUES('$port_title', '$port_subtitle', '$category', '$newFileName');";
            $query2 = mysqli_query($conn, $query);
            if ($query2) {

                // Move the uploaded file to the target directory with the new name
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);
               header("location: ../client_side_pages.php?error=portfoliosuccess");
            }
        }
    }    
}


















 ?>
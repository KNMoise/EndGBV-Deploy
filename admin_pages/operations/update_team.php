<?php

	require_once '../includes/db.php';

	if (isset($_POST['update'])) {
		$id = mysqli_escape_string($conn, $_GET['id']);

		$names = mysqli_escape_string($conn, $_POST['names']); 
		$position = mysqli_escape_string($conn, $_POST['position']); 
		$instagram = mysqli_escape_string($conn, $_POST['instagram']);
		$twitter = mysqli_escape_string($conn, $_POST['twitter']); 
		$email = mysqli_escape_string($conn, $_POST['email']);  



		if (empty($names) || empty($position) || empty($instagram) || empty($twitter) || empty($email)) {
			header("location: ../client_side_pages.php?error=nomemberdata");

		} 
		else {

			if ($_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {


				//Directory Where To Store Uploaded Images
			    $targetDir = "../assets/img/frontend_images/";
			    
			    // Generate a new unique filename for the image
			    $newFileName = uniqid() . "_" . $_FILES["fileToUpload"]["name"];
			    // Get the original name of the uploaded file
			    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); 
			    // Create the path for the renamed file
			    $newFilePath = $targetDir . $newFileName;

			    //Check if the file is a valid image

			    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

			    $allowedExtensions = array("jpg", "jpeg", "png");


				if (!in_array($imageFileType, $allowedExtensions)) {

			        header("location: ../client_side_pages.php?error=error=wrongimagetype");
			    }else{

			            // select existing image file
			            $check = "SELECT image_url FROM team WHERE member_id='$id';";
			            $check2 = mysqli_query($conn, $check);

			             while ($rows = mysqli_fetch_assoc($check2)) {
			             	$image_url = $rows['image_url'];
			             }

			             // deleting of old file
			             $oldfilepath = "../assets/img/frontend_images/".$image_url;
			             unlink($oldfilepath);

			             // Move the uploaded file to the target directory with the new name
			             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);

			             //updating records in databse when file is also included
			             $query = "UPDATE team SET names = '$names', position = '$position', image_url = '$newFileName', instagram_url = '$instagram', twitter_url = '$twitter', email = '$email' WHERE member_id='$id';";
			            $query2 = mysqli_query($conn, $query);
			   			
			   			if ($query2) {
			   				header("location: ../client_side_pages.php?error=testmemberok");
			   			}
			        
			    }    


			} else {
				// Codes To RUn When No New File Is Selected
				$query = "UPDATE team SET names = '$names', position = '$position',  instagram_url = '$instagram', twitter_url = '$twitter', email = '$email' WHERE member_id='$id';";
				$query2 = mysqli_query($conn, $query);
				header("location: ../client_side_pages.php?error=testmemberok");
			}
			


			
		} 	
	} else {
		header("location: ../client_side_pages.php");
	}
	

	
































?>
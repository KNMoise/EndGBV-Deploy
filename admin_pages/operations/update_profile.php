<?php

	include '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$username = mysqli_escape_string($conn, $_POST['username']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$first_name = mysqli_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_escape_string($conn, $_POST['last_name']);
	$password = mysqli_escape_string($conn, $_POST['password']);


	if ($_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {


				//Directory Where To Store Uploaded Images
			    $targetDir = "../assets/img/users/";
			    
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

			        header("location: ../profile.php?error=error=wrongimagetype");
			    }else{

			            // select existing image file
			            $check = "SELECT image_url FROM users WHERE user_id='$id';";
			            $check2 = mysqli_query($conn, $check);

			             while ($rows = mysqli_fetch_assoc($check2)) {
			             	$image_url = $rows['image_url'];
			             }

			             //checking if file is default user image

			             if ($image_url !== 'default_user.jpg') {
			             			// deleting of old file

			             			$oldfilepath = "../assets/img/users/".$image_url;
			             			unlink($oldfilepath);

			             			// Move the uploaded file to the target directory with the new name
				             		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);

				             		//updating records in databse when file is also included

				             		$query = "UPDATE users SET fname = '$first_name', lname = '$last_name', image_url = '$newFileName', username = '$username', email = '$email', password= '$password' WHERE user_id='$id';";
				            		$query2 = mysqli_query($conn, $query);
				   			
				   					if ($query2) {
				   						header("location: ../profile.php?error=profileok");
				   					}
			             }else{


			             // Move the uploaded file to the target directory with the new name
			             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath);

			             //updating records in databse when file is also included
			             $query = "UPDATE users SET fname = '$first_name', lname = '$last_name', image_url = '$newFileName', username = '$username', email = '$email', password= '$password' WHERE user_id='$id';";
			            $query2 = mysqli_query($conn, $query);
			   			
			   			if ($query2) {
			   				header("location: ../profile.php?error=profileok");
			   			}
			   		}
			        
			    }
			}else{
				  $query = "UPDATE users SET fname = '$first_name', lname = '$last_name', username = '$username', email = '$email', password= '$password' WHERE user_id='$id';";
			            $query2 = mysqli_query($conn, $query);
			   			
			   			if ($query2) {
			   				header("location: ../profile.php?error=profileok");
			   			}
			}









?>
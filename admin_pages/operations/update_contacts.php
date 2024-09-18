<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$email = mysqli_escape_string($conn, $_POST['email']);
		$phone = mysqli_escape_string($conn, $_POST['phone']);
		$location = mysqli_escape_string($conn, $_POST['location']);
		
		//$id = mysqli_escape_string($conn, $_GET['id']);

		if (empty($email) || empty($phone) || empty($location)) {
			header("location: ../client_side_pages.php?error=nocontacts");
		} else {
			$query = "UPDATE contacts SET emails='$email', phones = '$phone', location = '$location' WHERE id = 1;";
			$query2 = mysqli_query($conn, $query);
			header("location: ../client_side_pages.php?error=updateontactsuccess");
		}
		
	} else {
		header("location: ../client_side_pages.php");
	}
	

	

















?>
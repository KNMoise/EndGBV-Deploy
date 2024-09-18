<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$desc_aboutus = mysqli_escape_string($conn, $_POST['desc_aboutus']);
		//$happy_clients = mysqli_escape_string($conn, $_POST['happy_clients']);
		//$projects = mysqli_escape_string($conn, $_POST['projects']);
		//$experience = mysqli_escape_string($conn, $_POST['experience']);
		$id = mysqli_escape_string($conn, $_GET['id']);
		
		if (empty($desc_aboutus)) {
			header("location: ../client_side_pages.php?error=noservice");
		} else {
			$query = "UPDATE about_us SET description='$desc_aboutus' WHERE about_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../client_side_pages.php?error=updateaboutsuccess");
		}
		
	} else {
		header("location: ../client_side_pages.php");
	}
	

	

















?>
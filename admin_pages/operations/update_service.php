<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$service_title = mysqli_escape_string($conn, $_POST['service_title']);
		$service_desc = mysqli_escape_string($conn, $_POST['service_desc']);
		$id = mysqli_escape_string($conn, $_GET['id']);

		if (empty($service_title) || empty($service_desc)) {
			header("location: ../client_side_pages.php?error=noservice");
		} else {
			$query = "UPDATE services SET service_title='$service_title', service_desc = '$service_desc' WHERE service_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../client_side_pages.php?error=updateservicesuccess");
		}
		
	} else {
		header("location: ../client_side_pages.php");
	}
	

	

















?>
<?php

	require '../includes/db.php';

	if (isset($_POST['save'])) {

		$service_title = mysqli_escape_string($conn, $_POST['service_title']);
		$service_desc = mysqli_escape_string($conn, $_POST['service_desc']);


		if (empty($service_title) || empty($service_desc)) {
			header("location: ../client_side_pages.php?error=noservice");
		} else {

			$query = "INSERT INTO services(service_title, service_desc) VALUES('$service_title', '$service_desc')";
			$query2 = mysqli_query($conn, $query);
			if ($query2) {
				header("location: ../client_side_pages.php?error=servicesuccess");
			} else {
				header("location: ../client_side_pages.php?error=servicefail");
			}
			

			
		}
	}else{
		header("location: ../client_side_pages.php");
	}





?>
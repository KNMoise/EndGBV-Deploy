<?php

	require '../includes/db.php';

	if (isset($_POST['save'])) {

		$desc_aboutus = mysqli_escape_string($conn, $_POST['desc_aboutus']);
		$happy_clients = mysqli_escape_string($conn, $_POST['happy_clients']);
		$projects = mysqli_escape_string($conn, $_POST['projects']);
		$experience = mysqli_escape_string($conn, $_POST['experience']);

		if (empty($desc_aboutus) || empty($happy_clients) || empty($projects) || empty($experience)) {
			header("location: ../client_side_pages.php?error=noaboutus");
		} else {

			$query = "INSERT INTO about_us(description, happy_clients, projects_done, experiance) VALUES('$desc_aboutus', '$happy_clients', '$projects', '$experience' )";
			$query2 = mysqli_query($conn, $query);
			if ($query2) {
				header("location: ../client_side_pages.php?error=aboutsuccess");
			} else {
				header("location: ../client_side_pages.php?error=aboutfail");
			}
			

			
		}
	}else{
		header("location: ../client_side_pages.php");
	}





?>
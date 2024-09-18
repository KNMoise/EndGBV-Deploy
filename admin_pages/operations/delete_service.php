<?php
	
	include '../includes/db.php';

	$service_id = mysqli_escape_string($conn, $_GET['id']);

	$query = "DELETE FROM services WHERE service_id='$service_id'";
	$query2 = mysqli_query($conn, $query);
	header("location: ../client_side_pages.php?error=deleteservicesuccess");







?>
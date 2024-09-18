<?php

	include '../includes/db.php';

	$about_id = mysqli_escape_string($conn, $_GET['id']);

	$query = "DELETE FROM about_us WHERE about_id = '$about_id';";
	$query2 = mysqli_query($conn, $query);
	header("location: ../client_side_pages.php?error=deleteaboutsuccess");





?>
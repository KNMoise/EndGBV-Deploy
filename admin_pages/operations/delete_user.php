<?php

	include '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$query = "DELETE FROM users WHERE user_id = '$id';";
	$query2 = mysqli_query($conn, $query);
	header("location: ../users.php?error=deleteusersuccess");





?>
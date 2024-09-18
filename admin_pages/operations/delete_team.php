<?php 
	require '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$query = "DELETE FROM team WHERE member_id = '$id';";
	$query2 = mysqli_query($conn, $query);
	header("location: ../client_side_pages.php?error=deleteteamsuccess");





?>
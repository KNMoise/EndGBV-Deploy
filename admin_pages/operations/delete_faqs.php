<?php

	include '../includes/db.php';




	$question_id = $_GET['question_id'];


	$query = " DELETE FROM faqs WHERE question_id='$question_id'; ";
	$query2 = mysqli_query($conn, $query);

	if ($query2) {
		header("location: ../client_side_pages.php?error=deletefaqssuccess");
	}else{
			header("location: ../client_side_pages.php?error=deletefaqsfail");
	}










?>
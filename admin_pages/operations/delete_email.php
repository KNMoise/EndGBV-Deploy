<?php

	include '../includes/db.php';




	$email_id = $_GET['id'];


	$query = " DELETE FROM emails WHERE email_id='$email_id'; ";
	$query2 = mysqli_query($conn, $query);

	if ($query2) {
		header("location: ../emails.php?error=deletesuccess");
	}else{
			header("location: ../emails.php?error=deletefail");
	}










?>
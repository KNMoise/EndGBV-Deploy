<?php

	require '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$query = " DELETE FROM incomes WHERE job_id='$id'; ";
	$query2 = mysqli_query($conn, $query);

	if ($query2) {
		header("location: ../incomes.php?error=deleteincomesuccess");
	}else{
			header("location: ../incomes.php?error=deleteincomefail");
	}

















?>
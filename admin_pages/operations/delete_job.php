<?php

	require '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$caseId = $_GET['id'];

	$query = " DELETE FROM FROM case_submissions WHERE id = $caseId";;
	
	$query2 = mysqli_query($conn, $query);

	if ($query2) {
		header("location: ../incomes.php?error=deleteincomesuccess");
	}else{
			header("location: ../incomes.php?error=deleteincomefail");
	}

















?>
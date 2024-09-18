<?php

	require '../includes/db.php';

	$id = mysqli_escape_string($conn, $_GET['id']);

	$query = " DELETE FROM expenses WHERE expense_id='$id'; ";
	$query2 = mysqli_query($conn, $query);

	if ($query2) {
		header("location: ../expenses.php?error=deleteexpensesuccess");
	}else{
			header("location: ../expenses.php?error=deleteexpensefail");
	}

















?>
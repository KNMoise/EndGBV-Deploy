<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$id = mysqli_escape_string($conn, $_GET['id']);

		$job_title = mysqli_escape_string($conn, $_POST['job_title']);
		$client_name = mysqli_escape_string($conn, $_POST['client_name']);
		$client_contact = mysqli_escape_string($conn, $_POST['client_contact']);
		//$job_date = mysqli_escape_string($conn, $_POST['job_date']);
		$income = mysqli_escape_string($conn, $_POST['income']);
		$payment_status = mysqli_escape_string($conn, $_POST['payment_status']);
		$description = mysqli_escape_string($conn, $_POST['description']);
	

		if ( empty($client_name) || empty($job_title) || empty($client_contact) || empty($income) || empty($payment_status) || empty($description) ) {
			header("location: ../edit_job?id=$id");
		} else {
			$query = "UPDATE incomes SET job_title='$job_title', client_name = '$client_name', client_contact = '$client_contact',income = '$income', payment_status = '$payment_status',  description = '$description' WHERE job_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../incomes.php?error=updateincomesuccess");
		}
		
	} else {
		header("location: ../incomes.php");
	}
	

	

















?>
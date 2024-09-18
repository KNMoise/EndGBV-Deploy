<?php 

	require_once '../includes/db.php';


	if (isset($_POST['new_job'])) {

		$job_title = mysqli_escape_string($conn, $_POST['job_title']);
		$client_name = mysqli_escape_string($conn, $_POST['client_name']);
		$client_contact = mysqli_escape_string($conn, $_POST['client_contact']);
		$job_date = date("Y-m-d");
		$income = mysqli_escape_string($conn, $_POST['income']);
		//$expenses = mysqli_escape_string($conn, $_POST['expenses']);
		$payment_status = mysqli_escape_string($conn, $_POST['payment_status']);
		$job_descr = mysqli_escape_string($conn, $_POST['job_descr']);

		if (empty($job_title) || empty($client_name) || empty($client_contact) || empty($income) || empty($payment_status) || empty($job_descr) ) {
			header("location: ../new_income.php?error=nojobdata");
		} else {

			$query = "INSERT INTO incomes(job_title, client_name, client_contact, job_date, income, payment_status, description) VALUES('$job_title','$client_name','$client_contact','$job_date','$income','$payment_status','$job_descr');";
			$query2 = mysqli_query($conn, $query);
			header("location: ../incomes.php?error=newjobsuccess");

			
		}
	}else{
		header("location: ../new_income.php?error=ddd");
	}









?>
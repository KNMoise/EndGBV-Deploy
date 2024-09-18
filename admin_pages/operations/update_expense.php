<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$id = mysqli_escape_string($conn, $_GET['id']);

		 $expense_title = mysqli_escape_string($conn, $_POST['expense_title']);
         $expense_date = mysqli_escape_string($conn, $_POST['expense_date']);
         $amount = mysqli_escape_string($conn, $_POST['amount']);
         $category = mysqli_escape_string($conn, $_POST['category']);
         $expense_desc = mysqli_escape_string($conn, $_POST['expense_desc']);
         $job_linked = mysqli_escape_string($conn, $_POST['job_linked']);
	

		if (empty($expense_title) || empty($amount) || empty($category) || empty($expense_desc) || empty($job_linked)) {
			header("location: ../edit_expense?id=$id");
		} else {
			$query = "UPDATE expenses SET expense_title='$expense_title', amount='$amount', category='$category', expense_desc='$expense_desc', job_linked='$job_linked' WHERE expense_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../expenses.php?error=updateexpensesuccess");
		}
		
	} else {
		header("location: ../expenses.php");
	}
	

	

















?>
<?php 

	require_once '../includes/db.php';


	if (isset($_POST['new_expenses'])) {

		 $expense_title = mysqli_escape_string($conn, $_POST['expense_title']);
         $expense_date = mysqli_escape_string($conn, $_POST['expense_date']);
         $amount = mysqli_escape_string($conn, $_POST['amount']);
         $category = mysqli_escape_string($conn, $_POST['category']);
         $expense_desc = mysqli_escape_string($conn, $_POST['expense_desc']);
         $job_linked = mysqli_escape_string($conn, $_POST['job_linked']);

		if (empty($expense_title) || empty($amount) || empty($category) || empty($expense_desc) || empty($job_linked)) {
			header("location: ../new_expenses.php?error=noexpensedata");
		} else {

			$query = "INSERT INTO expenses(expense_title, expense_date, amount, category, expense_desc, job_linked) VALUES('$expense_title',curdate(),'$amount','$category','$expense_desc','$job_linked');";
			$query2 = mysqli_query($conn, $query);
			header("location: ../expenses.php?error=newexpensesuccess");

			
		}
	}else{
		header("location: ../new_expense.php?error=ddd");
	}









?>
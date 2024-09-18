<?php 
	require_once '../includes/db.php';


	if (isset($_POST['update'])) {

		$question = mysqli_escape_string($conn, $_POST['question']);
		$answer = mysqli_escape_string($conn, $_POST['answer']);
		
		$id = mysqli_escape_string($conn, $_GET['id']);

		if (empty($question) || empty($answer)) {
			header("location: ../client_side_pages.php?error=noservice");
		} else {
			$query = "UPDATE faqs SET question='$question', answer = '$answer' WHERE question_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../client_side_pages.php?error=updatefaqssuccess");
		}
		
	} else {
		header("location: ../client_side_pages.php");
	}
	

	

















?>
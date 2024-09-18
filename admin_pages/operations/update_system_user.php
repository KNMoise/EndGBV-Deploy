<?php 
	require_once '../includes/db.php';


	if (isset($_POST['new_user'])) {

		$fname = mysqli_escape_string($conn, $_POST['fname']);
		$lname = mysqli_escape_string($conn, $_POST['lname']);
		$username = mysqli_escape_string($conn, $_POST['username']);
		$contact = mysqli_escape_string($conn, $_POST['contact']);
		$positions = mysqli_escape_string($conn, $_POST['positions']);
		$id = mysqli_escape_string($conn, $_GET['id']);

		if (empty($fname) ||empty($lname) || empty($username) || empty($contact) || empty($positions) ) {
			header("location: ../users.php?error=nouserdata");
		} else {
			$query = "UPDATE users SET fname='$fname',lname='$lname', username = '$username', email = '$contact', positions = '$positions' WHERE user_id = '$id';";
			$query2 = mysqli_query($conn, $query);
			header("location: ../users.php?error=updateusersuccess");
		}
		
	} else {
		header("location: ../users.php");
	}
	

	

















?>
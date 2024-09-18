<?php 

	require_once '../includes/db.php';


	if (isset($_POST['new_user'])) {

		$fname = mysqli_escape_string($conn, $_POST['fname']);
		$lname = mysqli_escape_string($conn, $_POST['lname']);
		$username = mysqli_escape_string($conn, $_POST['username']);
		$contact = mysqli_escape_string($conn, $_POST['contact']);
		$position = mysqli_escape_string($conn, $_POST['position']);
		$password = mysqli_escape_string($conn, $_POST['password']);

		
		if (empty($fname) || empty($lname) || empty($username) || empty($contact) || empty($password)) {
			header("location: ../new_system_user.php?error=nouserdata");
		} else {

			$query = "INSERT INTO users(fname,lname,username, email, password) VALUES('$fname','$lname','$username','$contact','$password');";
			$query2 = mysqli_query($conn, $query);
			header("location: ../users.php?error=newusersuccess");

			
		}
	}else{
		header("location: ../users.php?error=ddd");
	}









?>
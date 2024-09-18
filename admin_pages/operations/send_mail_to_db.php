<?php 

	require '../includes/db.php';

	$name = mysqli_escape_string($conn, $_POST['name']);
	$subject = mysqli_escape_string($conn, $_POST['subject']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$message = mysqli_escape_string($conn, $_POST['message']);

	$sql = "INSERT INTO emails(sender_names, sender_email, subject, message, date_Sent) VALUES('$name','$email', '$subject','$message', curdate())";
	$sql2 = mysqli_query($conn, $sql);
	header("location: ../../index.php");


























?>
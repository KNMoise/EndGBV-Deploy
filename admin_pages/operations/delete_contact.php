<?php
	require '../includes/db.php';

	$contact_id = mysqli_escape_string($conn, $_GET['contact_id']);

	$query = "DELETE FROM contacts WHERE contact_id='$contact_id';";
	$query2 = mysqli_query($conn, $query2);











?>
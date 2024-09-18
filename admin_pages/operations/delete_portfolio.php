
<?php 

	include '../includes/db.php';

	$port_id = mysqli_escape_string($conn, $_GET['id']);
	$query = "SELECT image_url FROM portfolio WHERE port_id = '$port_id';";
	$query2 = mysqli_query($conn, $query);
	
	while ($rows = mysqli_fetch_assoc($query2)) {
		$image_url = $rows['image_url'];	
	}

	$query3 = "DELETE FROM portfolio WHERE port_id = '$port_id';";
	$query4 = mysqli_query($conn, $query3);


	if ($query4) {
		$filepath = '../assets/img/frontend_images/'.$image_url;
		unlink($filepath);
		header("location: ../client_side_pages.php?error=deleteportsuccess");
	}


?>
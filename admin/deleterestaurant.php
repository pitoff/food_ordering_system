<?php
	include '../db/food_ordering.php';

	$delid = $_GET['id'];
	$sql = "DELETE FROM list_of_restaurants WHERE restaurant_idd = '$delid'";
	$result = mysqli_query($con, $sql);
	
	if ($result) {
		header("Location:adminindex.php");
	}
	
?>
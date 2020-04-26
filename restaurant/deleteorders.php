<?php
include '../db/food_ordering.php';
	$get = $_GET['order_id'];
	$sql = mysqli_query($con, "DELETE FROM orders WHERE order_id = '$get'");
	if ($sql) {
		header("Location:orders.php");
	}else{echo "not deleted";}
?>
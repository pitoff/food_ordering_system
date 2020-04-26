<?php
	include '../db/food_ordering.php';
	$delid = $_GET['id'];
	$sqldel = mysqli_query($con, "DELETE FROM menu WHERE food_id = '$delid'");
	if ($sqldel) {
		header("Location:viewmenu.php");
	}else{echo "not deleted";}
?>
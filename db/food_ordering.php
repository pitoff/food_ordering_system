<?php
$name = "localhost";
$username = "root";
$password = "";
$dbname = "food_ordering";

$con = mysqli_connect($name, $username, $password);
if (!$con) {
	mysqli_error($con);
}else{
	$dbselect =mysqli_select_db($con, $dbname);
}
?>
<?php
include 'header.php';
if (!isset($_SESSION['user_id'])) {
		header('location:signup.php');
	}$mysession = $_SESSION['user_id']; 


if (isset($_GET['action'])) {
 if ($_GET['action'] == 'delete') {
    $action = $_GET["food_id"];
    // $deleteit = mysqli_query($con, "DELETE FROM cart WHERE food_id = '$action'");
    // $deleteit = mysqli_query($con, "DELETE FROM orders WHERE food_id = '$action'");
   foreach ($_SESSION['food_cart'] as $keys => $values) {
     if ($values['item_id'] == $_GET['food_id']) {
       unset($_SESSION['food_cart'][$keys]);
        header ('location:cart.php');
     }
   }
 }
}

?>
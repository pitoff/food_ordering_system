<?php 
include 'header.php';
if (!isset($_SESSION['user_id'])) {
		header('location:signup.php');
	}$mysession = $_SESSION['user_id'];

if (isset($_POST['setcart'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$itemname = $_POST['itemname'];
	$price = $_POST['itemprice'];
	$food_id = $_POST['food_id'];
	$itemquantity = $_POST['itemquantity'];
	$itemrestaurant = $_POST['itemrestaurant'];
	$food_id = $_POST['food_id'];
	$user_id = $_POST['user_id'];



$getall = mysqli_query($con,"SELECT * FROM cart where itemname = '$itemname' AND user_id = '$mysession'");
if (mysqli_num_rows($getall) > 0) {
	$row = mysqli_fetch_array($getall);
	$cart_id = $row['cart_id'];
	$quantity =($row['quantity']) + 1;
	$updatequantity = mysqli_query($con,"UPDATE cart set itemquantity = '$quantity' where cart_id = '$cart_id'");
	
}else{
	$insert = mysqli_query($con,"INSERT INTO cart (username, email, itemname, itemquantity, itemprice, itemrestaurant, food_id, user_id) VALUES ('$username', '$email', '$itemname', '1', '$price', '$itemrestaurant', '$food_id', '$user_id')");
	
}

}

if (isset($_POST['getvalues'])) {
	$mysession =  $_POST['user_id'];
	$getlist = mysqli_query($con,"SELECT * FROM cart where user_id = '$mysession'");
	if (mysqli_num_rows($getlist) >0) {
		$grandtotal = 0;
		while ($row = mysqli_fetch_array($getlist)) {
			$itemname = $row['itemname'];
			$price = $row['itemprice'];
			$quantity = $row['itemquantity'];
			$food_id = $row['food_id'];
			$cart_id = $row['cart_id'];
			$total = $price * $quantity;
			$grandtotal = $grandtotal + $total;
			echo '<div class="item"><div class="name">'.$itemname.'</div><div class="quantity"><input type="text" readonly value="'.$quantity.'" style="width: 60%;height: 80%;margin:0 auto"></div><div class="remove"><i class="fa fa-trash" onclick="removeme('.$cart_id.')"></i></div><div class="price">'.$total.'</div></div>';
		}
		echo 'Total: '.$grandtotal.' <div class="submit" style="text-align:center"><a href="invoice.php?user_id='.$mysession.'">Checkout</a></div> ';
	}else{
		echo "You have not added anything to cart";
	}
}

if (isset($_POST['deletecart'])) {
	$cart_id = $_POST['cart_id'];
	$deleteit = mysqli_query($con,"DELETE FROM  cart where cart_id='$cart_id'");
}
 ?>
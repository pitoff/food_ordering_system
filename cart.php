<?php 
	include 'header.php';
	if (!isset($_SESSION['user_id'])) {
		header('location:signup.php');
	}$mysession = $_SESSION['user_id'];

$sql = "SELECT * from register WHERE user_id = '$mysession'";
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query); 
      $user_id = $row['user_id'];
      $name = $row['name'];
      $username = $row['username'];
      $email = $row['email'];

// if (isset($_GET['action'])) {
//  if ($_GET['action'] == 'delete') {
//    foreach ($_SESSION['food_cart'] as $keys => $values) {
//      if ($values['item_id']) {
//        unset($_SESSION['food_cart'][$keys]);
//         header ('location:checkout.php');
//      }
//    }
//  }
// } 

   foreach ($_SESSION['food_cart'] as $keys => $values) {
    if (isset($_POST['checkout'])) {
      $itemid = $values['item_id'];
      $itemname = $values['item_name'];
      $itemquantity = $values['item_quantity'];
      $itemprice =$values['item_price'];
      $itemrestaurant =$values['item_restaurant'];
      $itemrestaurantid =$values['item_restaurantid'];
      $date = date('Y-m-d');

      $insertorder = mysqli_query($con, "INSERT INTO orders (name, email, user_id, itemname, itemquantity, itemprice, itemrestaurant, restaurant_idd, food_id, created_at) VALUES ('{$name}','{$email}','{$mysession}','{$itemname}','{$itemquantity}','{$itemprice}','{$itemrestaurant}','{$itemrestaurantid}','{$itemid}','{$date}')"); 
      if ($insertorder) {
        unset($_SESSION['food_cart'][$keys]);
        header ('location:checkout.php');
      }else{
        header ('location:cart.php');
      }
   } 
 }
?>
	<div class="container">
	<div class="page_header text-center" style="margin-top: 90px;">
		<div class="well well-sm" style="margin-top: 3px !important;"><h2>Food cart</h2>
		<p style="font-family: comic Sans MS;">this is your food item cart</p>
		</div>
		
	</div>
  
  <div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Food item</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Restaurant</th>
						<th>SubTotal</th>
					</tr>
				</thead>
				<tbody>
				<?php
                  if (!empty($_SESSION['food_cart'])) {
                   $total = 0;
                   foreach ($_SESSION['food_cart'] as $keys => $values) {
              ?>
              <tr>
                <td><?php echo $values['item_name'];?></td>
                <td><?php echo $values['item_quantity'];?></td>
                <td><span>&#8358;</span><?php echo $values['item_price'];?></td>
                <td><?php echo $values['item_restaurant'];?></td>
                <!-- <td type="hidden"><?php echo $values['item_restaurantid'];?></td> -->
                <td><span>&#8358;</span><?php echo number_format($values['item_quantity'] * $values['item_price'], 2)?></td>
                <td><a href="delcart.php?action=delete&food_id=<?php echo $values['item_id'];?>"><span class="btn btn-danger">remove</span></a></td>
              </tr>
              <?php
                  $total = $total + ($values['item_quantity'] * $values['item_price']);
                }
              ?>
              <tr>
                <!-- <td><a href="showeachrestaurant.php?action=add&food_id=<?php echo $values['item_id'];?>&restaurant_idd=<?php echo $values['item_restuarantid'];?>"><span class="btn btn-success">back</span></a></td> -->
                <td colspan="2" align="right">Total</td>
                <td align="right"><span>&#8358;</span><?php echo number_format($total, 2);?></td>
                <!-- <td colspan="2" align="right" name="checkout"><a href="removecart.php?action=delete&user_id=<?php echo $mysession;?>"><span class="btn btn-danger">checkout</span></a></td> -->
                <form method="POST">
                <td colspan="2" align="right"><span class=""><input type="submit" class="btn btn-danger" name="checkout" value="checkout"></span></td>
                </form>
              </tr>
              <?php
                  }
              ?>
</tbody>
</table>
</div>

</div>
<?php include "footer.php"; ?>	
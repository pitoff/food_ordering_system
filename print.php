<?php
include 'header.php';
  if (!isset($_SESSION['user_id'])) {
    header('location:signup.php');
  }$mysession = $_SESSION['user_id'];

  $selectname = mysqli_query($con, "SELECT * FROM register WHERE user_id = '$mysession'");
  if (mysqli_num_rows($selectname)) {
  	while ($row = mysqli_fetch_assoc($selectname)) {
  		$id = $row['user_id'];
  		$name = $row['name'];
  	}
  }

  $select = mysqli_query($con, "SELECT * FROM orders WHERE user_id = '$mysession'");
  $count = 0;
  $total = 0;
  if (mysqli_num_rows($select)>$count) {
  	while ($row = mysqli_fetch_assoc($select)) {
  		$id = $row['order_id'];
  		$email[] = $row['email'];
  		$itemname[] = $row['itemname'];
  		$itemquantity[] = $row['itemquantity'];
  		$itemprice[] = $row['itemprice'];
  		$itemrestaurant[] = $row['itemrestaurant'];
  		$datetime[] = $row['created_at'];
  		$count++;
  	}
  }

  $selectdelivery = mysqli_query($con, "SELECT * FROM delivery WHERE user_id = '$mysession'");
  if (mysqli_num_rows($selectdelivery)) {
  	while ($row = mysqli_fetch_assoc($selectdelivery)) {
  		$id = $row['id'];
  		$deliveryaddress = $row['delivery_address'];
  		$landmark = $row['delivery_landmark'];
  		$deliverytime = $row['delivery_time'];
  		$phonenumber = $row['phonenumber'];
  		$payment = $row['payment_type'];
  		$created_at = $row['created_at'];
  	}
  }
?>
<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			 
			 <table class="table table-condensed table-striped table-responsive table-bordered" style="text-align: center">
			 <div class="well well-sm" style="text-align: center"><h2>SUCCESSFUL ORDER</h2></div>
			 <tr>
			 <th style="text-align: center">FOOD ITEM</th>
			 <th>QUANTITY </th>
			 <th> AMOUNT</th>
			 <th> RESTAURANT </th>
			 </tr>
			<?php for($x=0; $x<$count; $x++) {?>
			<tr>
				<td><?php echo "$itemname[$x]";?></td>
				<td><?php echo "$itemquantity[$x]";?></td>
				<td><?php echo '<span>&#8358;</span>' ."$itemprice[$x]";?></td>
				<td><?php echo "$itemrestaurant[$x]";?></td>
				
			</tr>
			<p>
				<?php $t1 = $itemquantity[$x] * $itemprice[$x];
            		$t2 = $total += $t1;  
            ?>
			</p>
			<?php }?>
			</table>
        <div class="well well-lg" style="font-weight: bold;">
          <p>Dear valued customer</p>
      			<p><span style="color: red;"><?php echo "$name";?></span>, the total amount of all your food order is <span style="color: red;"><?php echo '<span>&#8358;</span>'.number_format($t2, 2);?></span> and will be delivered by <span style="color: red;"><?php echo "$deliverytime";?></span> to your location @ <span style="color: red;"><?php echo "$deliveryaddress";?></span></p>
      		<p>Your payment will be done by <span style="color: red;"><?php echo "$payment";?></span></p>
      		<h4 style="text-align: center; font-weight: bold; font-family: comic Sans MS;">Thanks for your patronage</h4>
          <a href="index.php"><span class="btn btn-success">Done</span></a>
        </div>

	</div>
	<div class="col-md-3">
    
  </div>
	</div>
</div>
<?php include "footer.php";?>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	})
</script>

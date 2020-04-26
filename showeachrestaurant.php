<?php
include 'header.php';
$get = $_GET['restaurant_idd'];

//gets a particular restaurant id
// if(isset($_SESSION['rest_id'])){
//   $get = $_SESSION['rest_id'];
// }

if (!isset($_SESSION['user_id'])) {
		header('location:signup.php');
	}$mysession = $_SESSION['user_id']; 

//selects the user
		$sql = "SELECT * from register WHERE user_id = '$mysession'";
		$query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query); 
			$user_id = $row['user_id'];
			$name = $row['name'];
			$username = $row['username'];
			$email = $row['email'];

  if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['food_cart'])) {
    $item_array_id = array_column($_SESSION['food_cart'], 'item_id');
    if (!in_array($_GET['food_id'], $item_array_id)) {
      
        $count = 0;
        $count = count($_SESSION['food_cart']);
        $item_array = array(
        'item_id' => $_GET['food_id'],
        'item_name' => $_POST['hidden_food_name'],
        'item_price' => $_POST['hidden_food_price'],
        'item_restaurant' => $_POST['hidden_restaurant'],
        'item_restaurantid' => $_POST['hidden_restaurantid'],
        'item_quantity' => $_POST['quantity']
        );
        $_SESSION['food_cart'][$count] = $item_array;
    }else {
      echo '<script>window.location="cart.php"</script>';
      echo '<script>alert("item already added in cart")</script>';

    }
  }else{
    $item_array = array(
        'item_id' => $_GET['food_id'],
        'item_name' => $_POST['hidden_food_name'],
        'item_price' => $_POST['hidden_food_price'],
        'item_restaurant' => $_POST['hidden_restaurant'],
        'item_restaurantid' => $_POST['hidden_restaurantid'],
        'item_quantity' => $_POST['quantity']
      );
    $_SESSION['food_cart'][0] = $item_array;
  }
} 
?>
  	
 <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
 <div class="row">
   <div class="col-md-12" style="background: #292929;">
     <a href="cart.php" type="btn" role="button"><span class="fa fa-shopping-cart" style="font-size: 50px; color: white;"></span><span class="badge" style="color: white;"><?php echo array_sum(array_column($_SESSION['food_cart'], 'item_quantity'));?></span></a>
   </div>
 </div>
 </div>

  <div class="container">
  <div class="row">
  <div class="well well-sm" style="font-family: comic Sans MS; font-size: 20px; text-align: center;"> you are logged in as <?php echo $username;?></div>
    <div style="font-size: 30px; font-family: Comic Sans MS; text-align: center; margin-bottom: 20px;">availabe food items</div>
    <?php 
      $sql2 = "SELECT * FROM menu WHERE restaurant_idd = $get AND food_category = 'rice'";
      $sqlresult2 = mysqli_query($con, $sql2);
        while($row = mysqli_fetch_assoc($sqlresult2)){
    ?>
      <div class="col-md-3" style="height:450px;">
        <form method = "POST" action = "showeachrestaurant.php?action=add&food_id=<?php echo $row['food_id'];?>&restaurant_idd=<?php echo $get?>">
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image'];?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><span>&#8358;</span><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929; font-weight: bold;"><?php echo 'from' .' '.$row['restaurant'];?></h5>
            <input type="text" class="form-control" name="quantity" value="1" />
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="hidden" name="hidden_restaurantid" value="<?php echo $row['restaurant_idd']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
  </div>
  <div class="row">
    <?php 
      $sql2 = "SELECT * FROM menu WHERE restaurant_idd = $get AND food_category = 'noodlespasta'";
      $sqlresult2 = mysqli_query($con, $sql2);
        while($row = mysqli_fetch_assoc($sqlresult2)){
    ?>
      <div class="col-md-3" style="height:450px;">
        <form method = "POST" action = "showeachrestaurant.php?action=add&food_id=<?php echo $row['food_id'];?>&restaurant_idd=<?php echo $get?>">
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image'];?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><span>&#8358;</span><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929; font-weight: bold;"><?php echo 'from' .' '.$row['restaurant'];?></h5>
            <input type="text" class="form-control" name="quantity" value="1" />
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="hidden" name="hidden_restaurantid" value="<?php echo $row['restaurant_idd']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
  </div>
  <div class="row">
    <?php 
      $sql2 = "SELECT * FROM menu WHERE restaurant_idd = $get AND food_category = 'soup'";
      $sqlresult2 = mysqli_query($con, $sql2);
        while($row = mysqli_fetch_assoc($sqlresult2)){
    ?>
      <div class="col-md-3" style="height:450px;">
        <form method = "POST" action = "showeachrestaurant.php?action=add&food_id=<?php echo $row['food_id'];?>&restaurant_idd=<?php echo $get?>">
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image'];?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><span>&#8358;</span><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929; font-weight: bold;"><?php echo 'from' .' '.$row['restaurant'];?></h5>
            <input type="text" class="form-control" name="quantity" value="1" />
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="hidden" name="hidden_restaurantid" value="<?php echo $row['restaurant_idd']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
  </div>
  <div class="row">
    <?php 
      $sql2 = "SELECT * FROM menu WHERE restaurant_idd = $get AND food_category = 'snacks'";
      $sqlresult2 = mysqli_query($con, $sql2);
        while($row = mysqli_fetch_assoc($sqlresult2)){
    ?>
      <div class="col-md-3" style="height:450px;">
        <form method = "POST" action = "showeachrestaurant.php?action=add&food_id=<?php echo $row['food_id'];?>&restaurant_idd=<?php echo $get?>">
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image'];?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><span>&#8358;</span><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929; font-weight: bold;"><?php echo 'from' .' '.$row['restaurant'];?></h5>
            <input type="text" class="form-control" name="quantity" value="1" />
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="hidden" name="hidden_restaurantid" value="<?php echo $row['restaurant_idd']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
  </div>
  <div class="row">
    <?php 
      $sql2 = "SELECT * FROM menu WHERE restaurant_idd = $get AND food_category = 'extra'";
      $sqlresult2 = mysqli_query($con, $sql2);
        while($row = mysqli_fetch_assoc($sqlresult2)){
    ?>
      <div class="col-md-3" style="height:450px;">
        <form method = "POST" action = "showeachrestaurant.php?action=add&food_id=<?php echo $row['food_id'];?>&restaurant_idd=<?php echo $get?>">
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image'];?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><span>&#8358;</span><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929; font-weight: bold;"><?php echo 'from' .' '.$row['restaurant'];?></h5>
            <input type="text" class="form-control" name="quantity" value="1" />
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="hidden" name="hidden_restaurantid" value="<?php echo $row['restaurant_idd']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
  </div>
  </div>
  <?php include "footer.php"; ?>

  <!-- <div class="modal fade" id="modalcart">
        <form role="form" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">list of order items</h4>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
          <table class="table table-bordered">
              <tr>
                <th>food</th>
                <th>quantity</th>
                <th>price</th>
                <th>restaurant</th>
                <th>total</th>
                <th>action</th>
              </tr>
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
                <td><span>&#8358;</span><?php echo number_format($values['item_quantity'] * $values['item_price'], 2)?></td>
                <td><a href="delcart.php?action=delete&food_id=<?php echo $values['item_id'];?>"><span class="fa fa-remove"></span></a></td>
              </tr>
              <?php
                  $total = $total + ($values['item_quantity'] * $values['item_price']);
                }
              ?>
              <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right"><span>&#8358;</span><?php echo number_format($total, 2);?></td>
                <td></td>
              </tr>
              <?php
                  }
              ?>
          </table>
        </div>
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-default" name="buy">Buy</button> -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </form>
        </div><!-- /.modal --> -->
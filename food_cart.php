<?php
// if (isset($_POST['add_to_cart'])) {
//   if (isset($_SESSION['food_cart'])) {
//     $item_array_id = array_column($_SESSION['food_cart'], 'item_id');
//     if (!in_array($_GET['food_id'], $item_array_id)) {
//         $count = count($_SESSION['food_cart']);
//         $item_array = array(
//         'item_id' => $_GET['food_id'],
//         'item_name' => $_POST['hidden_food_name'],
//         'item_price' => $_POST['hidden_food_price'],
//         'item_restaurant' => $_POST['hidden_restaurant'],
//         'item_quantity' => $_POST['quantity']
//         );
//         $_SESSION['food_cart'][$count] = $item_array;
//     }else{
//       echo '<script>alert("food item already added in cart")</script>';
//       echo '<script>window.location="index.php"</script>';
//     }
//   }else{
//     $item_array = array(
//         'item_id' => $_GET['food_id'],
//         'item_name' => $_POST['hidden_food_name'],
//         'item_price' => $_POST['hidden_food_price'],
//         'item_restaurant' => $_POST['hidden_restaurant'],
//         'item_quantity' => $_POST['quantity']
//       );
//     $_SESSION['food_cart'][0] = $item_array;
//   }
// }
// if (isset($_GET['action'])) {
//  if ($_GET['action'] == 'delete') {
//    foreach ($_SESSION['food_cart'] as $keys => $values) {
//      if ($values['item_id'] == $_GET['food_id']) {
//        unset($_SESSION['food_cart'][$keys]);
//        echo '<script>alert("food item removed")</script>';
//        echo '<script>window.location="index.php"</script>';
//      }
//    }
//  }
// }

// if (isset($_POST['buy'])) {
//   echo '<script>window.location="signup.php"</script>';
// }
?>
  	
 <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
 <div class="row">
   <!-- <div class="col-md-12" style="background: #292929;">
     <a type="btn" data-toggle="modal" data-target="#modalcart" role="button"><span class="fa fa-shopping-cart" style="font-size: 50px; color: white;"></span><span class="badge" style="color: white;"><?php echo array_sum(array_column($_SESSION['food_cart'], 'item_quantity'));?></span></a>
   </div> -->
 </div>
 </div>

  <div class="container">
  <div class="row">
    <div style="font-size: 30px; font-family: Comic Sans MS; text-align: center; margin-bottom: 20px;">Some featured food items</div>
    <?php 
      $sql = "SELECT * FROM menu ORDER BY food_id ASC LIMIT 12";
      $sqlresult = mysqli_query($con, $sql);
      if(mysqli_num_rows($sqlresult)>0){
        while($row = mysqli_fetch_assoc($sqlresult)){
    ?>
      <div class="col-md-3" style="height:430px;">
        <!-- <form method = "POST" action = ""> -->
          <div style="background: ; border-radius: 5px;text-align: center; " class="thumbnail">
            <img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="./images/<?php echo $row['food_image']; ?>" alt="..."/><br/>
            <h4 style="color: #292929;"><?php echo $row['food']; ?></h4>
            <h5 style="color: #292929;"><?php echo $row['price']; ?></h5>
            <h5 style="color: #292929;"><?php echo 'from' .' '.$row['restaurant']; ?></h5>
            <!-- <input type="text" class="form-control" name="quantity" value="1"/>
            <input type="hidden" name="hidden_food_name" value="<?php echo $row['food']; ?>"/>
            <input type="hidden" name="hidden_food_price" value="<?php echo $row['price']; ?>"/>
            <input type="hidden" name="hidden_restaurant" value="<?php echo $row['restaurant']; ?>"/>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to cart"/> -->
          </div>
        <!-- </form> -->
      </div>
      <?php
        }
      }
      ?>
  </div>
  </div>


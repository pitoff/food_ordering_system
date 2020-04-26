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


  $selexisting = mysqli_query($con, "SELECT * FROM delivery WHERE user_id = '$mysession'");
  if (mysqli_num_rows($selexisting)) {
    while ($row = mysqli_fetch_assoc($selexisting)) {
      $id = $row['id'];
      $userid = $row['user_id'];
      $del = $row['delivery_address'];
      $lm = $row['delivery_landmark'];
      $delt = $row['delivery_time'];
      $phone = $row['phonenumber'];
      $pay = $row['payment_type'];
      $ctype = $row['card_type'];
      $cnum = $row['card_num'];
      $exp = $row['expiry'];
      $pin1 = $row['pin'];
      $digitpin1 = $row['digitpin'];
    }
  }


  if (isset($_POST['submit'])) {
    $deliveryaddress = $_POST['deliveryaddress'];
    $landmark = $_POST['landmark'];
    $deliverytime = $_POST['deliverytime'];
    $phonenumber = $_POST['phonenumber'];
    $payment = $_POST['paymenttype'];
    $cardtype = $_POST['cardtype'];
    $cardnum = $_POST['cardnumber'];
    $expiry = $_POST['expiry'];
    $pin = $_POST['cardpin'];
    $digitpin = $_POST['digitpin'];


    if (!empty($deliveryaddress) && !empty($landmark) && !empty($deliverytime) && !empty($phonenumber) && !empty($payment) ) {
    if (mysqli_num_rows($selexisting)>=1) {
      $updatedelivery = mysqli_query($con, "UPDATE delivery set delivery_address = '$deliveryaddress', delivery_landmark = '$landmark', delivery_time = '$deliverytime', phonenumber = '$phonenumber', payment_type = '$payment', card_type = '$cardtype', card_num = '$cardnum', expiry = '$expiry', pin = '$pin', digitpin = '$digitpin' WHERE user_id = '$mysession'");
        if ($updatedelivery) {
          header("location:print.php");
        }else{echo "nill";}
    }else{ 
      $input = mysqli_query($con, "INSERT INTO delivery (user_id,delivery_address,delivery_landmark,delivery_time,phonenumber,payment_type,card_type,card_num,expiry,pin,digitpin) VALUES ('{$mysession}','{$deliveryaddress}','{$landmark}','{$deliverytime}','{$phonenumber}','{$payment}','{$cardtype}','{$cardnum}','{$expiry}','{$pin}','{$digitpin}')");
     if ($input) {
        header("location:print.php");
      }else{echo "nill";}
      }
  }else{echo "you might have incomplete field";}
  }
?>
<script>
  function showhiddenform() {
    if (document.getElementById('creditcheck').checked) {
        document.getElementById('hiddenform').style.display='block';
    }else{
      document.getElementById('hiddenform').style.display='none';
    }
  }
</script>
<style type="text/css">
        .checkr{
            background-image: url("images/1544708214060-w2880-c7.jpg") !important;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .checkstyle{
            opacity: 0.8 !important;
            font-weight: bold;
        }
        .rq {
          color: #FF0000;
          font-size: 10pt;
          }
    </style>
<div class="container">
<div class="row" style="margin-top: 90px;">
  <div class="checkr">
	<div class="checkstyle well well-sm" style="text-align: center;">
		<h1>Checkout</h1>
	</div>
  </div>
</div>

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<form method="POST" action="">                   
          <div class="form-group">
            <label for="exampleInputEmail1"><span class="fa fa-map-marker"></span> Address</label>
            <input type="text" name = "deliveryaddress" class="form-control" id="exampleInputEmail1" placeholder="Enter address" value="<?php if (isset($del)){ echo $del;}?>">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Landmark</label>
            <input type="text" name = "landmark" class="form-control" id="exampleInputname" placeholder="nearest bus stop" value="<?php if (isset($lm)){ echo $lm;}?>">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Delivery time</label>
            <select name="deliverytime" class="form-control">
              <option>...</option>
              <option>9am</option>
              <option>12pm</option>
              <option>3pm</option>
              <option>6pm</option>
              <option>9pm</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputphonenumber"><span class="fa fa-phone"></span> PhoneNumber</label>
            <input type="text" name = "phonenumber" class="form-control" id="exampleInputphonenumber" placeholder="PhoneNumber" value="<?php if (isset($phone)){ echo $phone;}?>">
          </div>
          <div class="form-group">
            <label for="exampleInputphonenumber"><span class="fa fa-credit-card"></span> Payment type</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="cashcheck" name="paymenttype" value="cash"> Cash on delivery
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="creditcheck" name="paymenttype" value="creditcard" onclick="showhiddenform()"> Credit card
          </div>
          <div class="" id="hiddenform" style="display: none;">
            <div class="form-group">
            <label for="exampleInputname">Card type</label>
            <select name="cardtype" class="form-control">
              <option>...</option>
              <option>Verve</option>
              <option>Master card</option>
              <option>Visa card</option>
            </select>
          </div>
            <div class="form-group">
            <label for="exampleInputphonenumber"><span class="rq">*</span> card number</label>
            <input type="text" name="cardnumber" class="form-control">
            </div>
            <div class="form-group">
            <label for="exampleInputphonenumber"><span class="rq">*</span> expiry date</label>
            <input type="text" name="expiry" class="form-control">
            </div>
            <div class="form-group">
            <label for="exampleInputphonenumber"><span class="rq">*</span> card pin</label>
            <input type="text" name="cardpin" class="form-control">
            </div>
            <div class="form-group">
            <label for="exampleInputphonenumber"><span class="rq">*</span> 3 digit pin</label>
            <input type="text" name="digitpin" class="form-control">
            </div>
          </div>
      
        <button type="submit" class="btn btn-default" name="submit">proceed</button>
        <a href="logout.php"><span class="pull-right btn btn-default">logout</span></a>
        <!-- <div class="modal-footer">
        </div> -->
      </form>
</div>
<div class="col-sm-3"></div>
</div>
</div>
<?php include "footer.php"; ?>
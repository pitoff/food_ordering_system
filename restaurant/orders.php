<?php
session_start();
include '../db/food_ordering.php';
if (!isset($_SESSION['restaurant_idd'])) {
	    header("location:restaurantlogin.php");
	}else{
		$restid = $_SESSION['restaurant_idd'];
	}
include "restaurantheader.php";
include "restaurantsidebar.php";

$sql = mysqli_query($con, "SELECT * FROM orders inner join delivery on orders.user_id = delivery.user_id WHERE restaurant_idd = '$restid'");
$name = []; 
$count =0;
	if(mysqli_num_rows($sql)>$count){
		while($row = mysqli_fetch_assoc($sql)){
		    $id[] = $row['order_id'];
			// $username[] = $row['username'];
            $name[] =$row['name'];
			$user_id[] = $row['user_id'];
			$email[] = $row['email'];
			$itemname[] = $row['itemname'];
			$itemquantity[] = $row['itemquantity'];
			$itemprice[] = $row['itemprice'];
			$itemrestaurant[] = $row['itemrestaurant'];
			$restaurantid[] = $row['restaurant_idd'];
			$foodid[] = $row['food_id'];
            $date[] = $row['created_at'];
            $delivery[] = $row['delivery_time'];
            $deliveryaddress[] = $row['delivery_address'];
            $landmark[] = $row['delivery_landmark'];
            $phonenumber[] = $row['phonenumber'];
            $payment[] = $row['payment_type'];
			$count++;
		}
	}else{echo 'could not select' .mysqli_error($con);}

    if (isset($_POST['submit'])) {
        $itemnm = $_POST["hidden_item"];
        $itempc = $_POST["hidden_item_price"];
        $itemqt = $_POST["hidden_quantity"];
        $date = date('Y-m-d');
        $insertordertorestaurant = mysqli_query($con, "INSERT INTO processed (itemname, itemprice, itemquantity, restaurant_idd, created_at) VALUES ('{$itemnm}', '{$itempc}', '{$itemqt}', '{$restid}', '{$date}')");
        if ($insertordertorestaurant) {
            header("location:orders.php");
        }else{echo "bad";}
    }
?>
<script type="text/javascript">
    function submitbtn(){
    getElementById("submitbtn").disabled=true;
}
</script>
<div class="container">
<div class="row">
        <div class="well well-lg updaterestaurant" style="font-size: 50px; text-transform: uppercase; font-weight: 600; text-align: center; margin-top: 50px;">
            <h1>Orders</h1>
        </div>
    </div>
 <div class="row" style="margin-top: 0px;">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-10">
    <ul class="nav nav-tabs">
        <li class="active"><a href="orders.php">Order</a></li>
        <li><a href="processed.php">Processed</a></li>
    </ul>
    <table class="table table-striped table-responsive table-bordered table-condensed">
        <thead>
          <tr>
            <th>Food item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Restaurant</th>
            <th>Email</th>
            <th>name of customer</th>
            <th>date & time of order</th>
            <th>Delivery time</th>
            <th>Delivery address</th>
            <th>landmark</th>
            <th>Phonenumber</th>
            <th>Payment type</th>
            <th>Process</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php for($i=0; $i<$count; $i++) { ?>
        <form id="theform" action="" method="POST">
        <tr>
                <td><input type="hidden" name="hidden_item" value="<?php echo $itemname[$i]; ?>"/><?php echo $itemname[$i]; ?></td>
                <td><input type="hidden" name="hidden_quantity" value="<?php echo $itemquantity[$i]; ?>"/><?php echo $itemquantity[$i]; ?></td>
                <td><input type="hidden" name="hidden_item_price" value="<?php echo $itemprice[$i]; ?>"/><?php echo $itemprice[$i]; ?></td>
                <td><?php echo $itemrestaurant[$i]; ?></td>
                <td><?php echo $email[$i]; ?></td>
                <td><?php echo $name[$i]; ?></td>
                <td><?php echo $date[$i]; ?></td>
                <td><?php echo $delivery[$i]; ?></td>
                <td><?php echo $deliveryaddress[$i]; ?></td>
                <td><?php echo $landmark[$i]; ?></td>
                <td><?php echo $phonenumber[$i];?></td>
                <td><?php echo $payment[$i]; ?></td>
                <td><input type="submit" name="submit" id="submitbtn" class="btn btn-success" value="process"/></td>
                <td><a href="deleteorders.php?order_id=<?php echo $id[$i];?>"><span class="btn btn-danger">Remove</span></a></td>

        </tr>
        </form>
        <?php } ?>
        </table>
        
	
    </div>
    <div class="col-md-1">
      
    </div>
  </div>
  </div>
  <script text="javascript">
      $('#theform').submit(function()
 {
    $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');

    return true;
  });
  </script>
  <script>
    $(document).ready(function () {

        $("#formdisable").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#submitbtn").attr("disabled", true);

            //disable a normal button
            $("#btnTest").attr("disabled", true);

            return true;

        });
    });
</script>
<script type="text/javascript">
    function disableButton(btn){
        document.getElementById(btn.id).disabled = true;
        alert("Button has been disabled.");
    }
</script>
<!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>  
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>    
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

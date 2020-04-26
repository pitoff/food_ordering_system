<?php
    session_start();
    include '../db/food_ordering.php';
    if (!isset($_SESSION['admin_id'])) {
        header("location:adminlogin.php");
    }
    include 'adminheader.php';
    include 'adminsidebar.php';
	
	$getid = $_GET['id'];
		//select on that id
	$sql = "SELECT * FROM processed inner join list_of_restaurants on processed.restaurant_idd = list_of_restaurants.restaurant_idd";
	$result = mysqli_query($con, $sql);
	$count = 0;
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$id[] = $row['id'];
			$restid[] = $row['restaurant_idd'];
			$restname[] = $row['restaurant_name'];
			$itemname[] = $row['itemname'];
			$itemprice[] = $row['itemprice'];
			$itemquantity[] = $row['itemquantity'];
			$date[] = $row['created_at'];
			$count++;
		}
	}else{echo 'selection failed' .mysqli_error($con);}
?>
<div class="container">
<div class="row">
        <div class="well well-lg updaterestaurant" style="font-size: 50px; text-transform: uppercase; font-weight: 600; text-align: center; margin-top: 50px;">
            <h1>All restaurant orders</h1>
        </div>
    </div>
 <div class="row" style="margin-top: 0px;">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-10">
    <table class="table table-striped table-responsive table-bordered table-condensed">
        <thead>
          <tr>
            <th>itemname</th>
            <th>itemquantity</th>
            <th>itemprice</th>
            <th>restaurant ordered from</th>
            <th>Date of order</th>
          </tr>
        </thead>
        <?php for($i=0; $i<$count; $i++) { ?>
        <tr>
                <td><?php echo $itemname[$i]; ?></td>
                <td><?php echo $itemquantity[$i]; ?></td>
                <td><?php echo $itemprice[$i]; ?></td>
                <td><?php echo $restname[$i]; ?></td>
                <td><?php echo $date[$i]; ?></td>
        </tr>
        <?php } ?>
        </table>
        
	
    </div>
    <div class="col-md-1">
      
    </div>
  </div>
  </div>

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
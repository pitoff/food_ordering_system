<?php
session_start();
	include "restaurantheader.php";
    include "restaurantsidebar.php";
	include "../db/food_ordering.php";
	$restid = $_SESSION['restaurant_idd'];

	$sql = "SELECT * FROM menu WHERE restaurant_idd = '$restid'";
	$result = mysqli_query($con, $sql);
	$count =0;
	if(mysqli_num_rows($result)>$count){
		while($row = mysqli_fetch_assoc($result)){
			$id[] = $row['food_id'];
			$restaurant[] = $row['restaurant'];
			$food_category[] = $row['food_category'];
			$food[] = $row['food'];
			$price[] = $row['price'];
			$fimage[] = $row['food_image'];
			$count++;
		}
	}else{echo 'selection failed' .mysqli_error($con);}

	$sql1 = mysqli_query($con, "SELECT * FROM menu WHERE restaurant_idd = '$restid'");
	if(mysqli_num_rows($sql1)){
		while($row = mysqli_fetch_assoc($sql1)){
			$id1 = $row['food_id'];
			$restaurant1 = $row['restaurant'];
			$food_category1 = $row['food_category'];
			$food1 = $row['food'];
			$price1 = $row['price'];
			$fimage1 = $row['food_image'];
		}
	}else{echo 'failed to select restaurant name' .mysqli_error($con);}
?>
<section id="main-content">
    <section class="wrapper">
    	<div class="row">
			<div class="well well-lg updaterestaurant" style="font-size: 50px; text-transform: uppercase; font-weight: 600; text-align: center;">
				<?php echo $restaurant1 ?>
			</div>
		</div>

		<div class="panel-body">
			<table class="table table-striped table-responsive table-bordered table-condensed">
				<tr>
					<th>restaurant</th>
					<th>food_category</th>
					<th>food</th>
					<th>price</th>
					<th>image</th>
					<th>update</th>
					<th>delete</th>
				</tr>
			<?php for($x=0; $x<$count; $x++) {?>
				<tr>
					<td><?php echo $restaurant[$x]?></td>
					<td><?php echo $food_category[$x]?></td>
					<td><?php echo $food[$x]?></td>
					<td><?php echo $price[$x]?></td>
					<td><?php echo $fimage[$x]?></td>
					<td><a href = "update.php?id=<?php echo $id[$x];?>"><span class="fa fa-arrow-up" style="color: grey;"></span></a></td></div>
					<td><a href = "delete.php?id=<?php echo $id[$x];?>"><span class="fa fa-trash" style="color: grey;"></span></a></td>
				</tr>
			<?php }?>
			</table>
		</div>
	</section>
</section>
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
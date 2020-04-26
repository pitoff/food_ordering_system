<?php
	include "restaurantheader.php";
    include "restaurantsidebar.php";
	include '../db/food_ordering.php';
	$getid = $_GET['id'];
	 $sql = mysqli_query($con, "SELECT * FROM menu WHERE food_id = '$getid'");
	 if(mysqli_num_rows($sql)){
	 	while ($row = mysqli_fetch_assoc($sql)) {
	 		$id = $row['food_id'];
	 		$restaurant_id = $row['restaurant_id'];
	 		$restaurant = $row['restaurant'];
	 		$food_category = $row['food_category'];
	 		$food = $row['food'];
	 		$price = $row['price'];
	 		$image = $row['food_image'];
	 	}
	 }else{echo'could not select '.mysqli_error($con);}

	$sql1 = "SELECT * FRoM category";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows(($result1))) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
            $id1[] = $row1['id'];
            $cat[] = $row1['food_category']; 

        }
     }

	 if(isset($_POST['submit'])){
	 	$restaurant_id1 = $row['restaurant_id'];
	 	$restaurant1 = $row['restaurant'];
		$food_category1 = $_POST['food_category'];
		$food1 = $_POST['food'];
		$price1 = $_POST['price'];
		$image1 = $_POST['food_image'];

		$update = mysqli_query($con, "UPDATE menu SET food_category = '$food_category1', food = '$food1', price = '$price1', food_image = '$image1' WHERE food_id = '$getid'");
		if ($update) {
			echo "<script> alert ('update was sucessfull') </script>";
		}else{echo'could not update '.mysqli_error($con);}
	}
?>
<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->
    	<div class="row">
			<div class="col-lg-12">
                    <h3 class="page-header">Update menu</h3>
                </div>
		</div>

		<div class="panel-body">
            <form class="form-horizontal " method="POST">
            	<div class="form-group">
                    <label class="col-sm-2 control-label">restaurant</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $restaurant ?>" name="restaurant">
                    </div>
                </div>
            	<div class="form-group">
                   <label class="control-label col-lg-2" for="inputSuccess">Category</label>
                   <div class="col-lg-10">                 
                       <select name="food_category" class="form-control" id="category">
                           <?php foreach ($cat as $item) {
                              echo "<option> $item </option>";
                            }?>
                        </select>   
                   </div>
               	</div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">food</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $food ?>" name="food">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $price ?>" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="exampleInputFile">food image</label>
                    <input type="file" id="exampleInputFile3" value="<?php echo $image ?>" name="food_image">
                </div>
                <div class="form-group">
                <label class="control-label col-lg-2"><button type="submit" class="btn btn-primary" name="submit">Update</button></label>
                </div>
            </form>
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
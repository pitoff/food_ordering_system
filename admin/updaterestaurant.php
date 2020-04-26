<?php
	include '../db/food_ordering.php';
	include 'adminheader.php';
    include 'adminsidebar.php';


    $sql1 = "SELECT * FRoM category";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows(($result1))) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
            $id[] = $row1['id'];
            $cat[] = $row1['food_category']; 

        }
     }

	//get transfered id
	$getid = $_GET['id'];
		//select on that id
	$sql = "SELECT * FROM list_of_restaurants WHERE restaurant_idd = '$getid'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['restaurant_idd'];
			$eachrestaurant = $row['restaurant_name'];
		}
	}else{echo 'selection failed' .mysqli_error($con);}

	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$food = $_POST['food'];
		$price = $_POST['price'];
		$food_image = $_POST['food_image'];
		
		$insertmenu = mysqli_query($con, "INSERT INTO menu (restaurant, food_category, food, price, food_image) VALUES ('{$eachrestaurant}','{$category}', '{$food}', '{$price}', '{$food_image}')");
		if($insertmenu){
			echo "<script>alert('food menu added successfully')</script>";
		}else{ echo "insertion failed";}
	}
?>
<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->
    	<div class="row">
			<div class="well well-lg updaterestaurant" style="font-size: 50px; text-transform: uppercase; font-weight: 600; text-align: center;">
				<?php echo $eachrestaurant ?>
			</div>
		</div>

		<div class="panel-body">
            <form class="form-horizontal " method="POST">
            	<div class="form-group">
                    <label class="col-sm-2 control-label">restaurant</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $eachrestaurant ?>" name="restaurant_name">
                    </div>
                </div>
            	<div class="form-group">
                   <label class="control-label col-lg-2" for="inputSuccess">Category</label>
                   <div class="col-lg-10">                 
                       <select name="category" class="form-control" id="category">
                           <?php foreach ($cat as $item) {
                              echo "<option> $item </option>";
                            }?>
                        </select>   
                   </div>
               	</div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">food</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="food">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="exampleInputFile">food image</label>
                    <input type="file" id="exampleInputFile3" name="food_image">
                </div>
                <div class="form-group">
                <label class="control-label col-lg-2"><button type="submit" class="btn btn-primary" name="submit">Upload</button></label>
                </div>
            </form>
        </div>
	</section>
</section>
 <!-- container section start -->
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
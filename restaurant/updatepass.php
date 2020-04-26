<?php
session_start();
	include '../db/food_ordering.php';
	include "restaurantheader.php";
	include "restaurantsidebar.php";

	// $restid = $_GET['restaurant_id'];
	 $restid = $_SESSION['restaurant_idd'];

	$sql = "SELECT * FROM list_of_restaurants WHERE restaurant_idd = '$restid'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
		$restname = $row['restaurant_name'];
		$restpass = $row['restaurant_password'];
		$restpassmd5 = md5($restpass);
		}
	
	}else{echo'could not select '.mysqli_error($con);}

	if(isset($_POST['submit'])){
		$restname1 = $_POST['restaurant'];
		$restpass1 = $_POST['restaurant_password'];
		$restpass1md5 = md5($restpass1);

		$updatequery = mysqli_query($con, "UPDATE list_of_restaurants SET restaurant_name = '$restname1', restaurant_password = '$restpass1md5' WHERE restaurant_idd = '$restid'");
		if($updatequery){
			echo "<script> alert ('update was successful') </script>";
		}else{echo'not updated';}
				
	}
?>

<section id="main-content">
    <section class="wrapper">

          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Reset restaurant password</h3>
                </div>
            </div>

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <div class="panel-body">
              <form class="form-horizontal " method="POST">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Restaurant</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="restaurant" placeholder="restaurant name">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="restaurant_password" placeholder="restaurant password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>
  <!--main content end-->
     
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
<?php
    session_start();
    include '../db/food_ordering.php';
    if (!isset($_SESSION['admin_id'])) {
        header("location:adminlogin.php");
    }
    include 'adminheader.php';
    include 'adminsidebar.php';

    $sql = "SELECT * FROM list_of_restaurants ORDER BY restaurant_idd ASC";
    $sqlresult = mysqli_query($con, $sql);
    $count =0;
    if(mysqli_num_rows($sqlresult)>$count){
        while($row = mysqli_fetch_assoc($sqlresult)){
            $id[] = $row['restaurant_idd'];
            $restaurant[] = $row['restaurant_name'];
            $restaurantpass[] = $row['restaurant_password'];
            $count++;
        }
    }else{echo 'could not select' .mysqli_error($con);}
        
?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
            <div class="row">
            <?php for($x=0; $x<$count; $x++) {?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box dark-bg">
                        <i class="fa fa-cutlery"></i>
                        <div class="title"><?php echo $restaurant[$x]; ?></div>
                        <div style="font-size: 25px;">                            
                            <a type="btn" href="order.php?id=<?php echo $id[$x];?>"><div class="pull-left"><span class="fa fa-list-alt" style="color: white;"></span></div></a>
                            <a type="btn" href="updaterestaurant.php?id=<?php echo $id[$x];?>"><div class="pull-left"><span class="fa fa-arrow-up" style="color: white;margin-left: 20px;"></span></div></a>
                            <a type="btn" href="deleterestaurant.php?id=<?php echo $id[$x];?>"><div class="pull-right"><span class="fa fa-trash" style="color: white;"></span></div></a>
                        </div>                    
                    </div><!--/.info-box-->         
                </div><!--/.col-->
                <?php }?>
            </div><!--/.row-->

          </section>
      </section>
      <!--main content end-->
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
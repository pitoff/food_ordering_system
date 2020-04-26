<?php
session_start();
    include "restaurantheader.php";
    include "restaurantsidebar.php";
    include "../db/food_ordering.php";
    $restid = $_SESSION['restaurant_idd'];


  $sql = "SELECT * from list_of_restaurants WHERE restaurant_idd = '$restid' ";
  $query = mysqli_query($con, $sql);
  $count = mysqli_num_rows($query);
  $row = mysqli_fetch_array($query);
  $restaurant_id = $row['restaurant_idd'];
  $restaurantname = $row['restaurant_name'];

    if (isset($_POST['submit'])) {
        $category = $_POST['food_category'];

        $sql = "INSERT INTO category (food_category, restaurant_name) VALUES ('{$category}', '{$restaurantname}')";
        $query = mysqli_query($con, $sql);
        if ($sql) {
          echo "<script> alert ('category has been added') </script>";
        }else{echo "error occured";}
    }
?>  

      <!--main content start-->
  <section id="main-content">
    <section class="wrapper">

          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Upload restaurants</h3>
                </div>
            </div>

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <div class="panel-body">
              <form class="form-horizontal " method="POST">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="food_category" placeholder="Add food category">
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
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom checkbox & radio-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!--custom switch-->
    <script src="js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="js/jquery.tagsinput.js"></script>
    
    <!-- colorpicker -->
   
    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <!-- ck editor -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- custom form component script for this page-->
    <script src="js/form-component.js"></script>
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>


  </body>
</html>
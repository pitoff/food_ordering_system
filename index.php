<?php
  include "header.php";
  include "db/food_ordering.php";
  

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passmd5 = md5($password);
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    if (!empty($name) && !empty($username) && !empty($password) && !empty($email) && !empty($phonenumber)) {
      $insert = mysqli_query($con, "INSERT INTO register (name, username, password, email, phonenumber) VALUES ('{$name}','{$username}','{$passmd5}','{$email}','{$phonenumber}') ");
        if ($insert) {
          echo "<script>alert ('you are now a registered user')</script>";
        }else{echo "<script>alert ('failed to register')</script>";}
    }else{echo "<script>alert ('you might have some missing field')</script>";}
  }

  if (isset($_POST['login'])) {
    $username1 = $_POST['username'];
    $password1 = $_POST['password'];
    $pass1md5 = md5($password1);

    $login = mysqli_query($con, "SELECT * FROM register WHERE username = '$username1' && password = '$pass1md5' LIMIT 1");

    if (mysqli_num_rows($login) == 1){
      $row = mysqli_fetch_array($login);
      $_SESSION['user_id'] = $row['user_id'];
      echo "<script>alert ('login success you can select a restaurant to make order from') </script>";
      header("location:showallrestaurant.php");
  }else{echo "invalid";}
}

?>
<!-- <div class="container"> -->
  <div class="row">
    <!-- <div class="" id="orderfood">
    <div style="background: #131313; opacity: 0.8; height: 100%;">
      <p class="orderfood_text">BLS</p>      
        <div class="signup_btn" style="float: left;">
          <button class="btn btn-primary" id="slide" data-toggle="modal" role="button" data-target="#signup"> Sign Up </button>
        </div>
        <div class="login_btn" style="float: left;">
          <button class="btn btn-primary" id="slide2" data-toggle="modal" role="button" data-target="#login"> Login </button>
        </div>
    </div>
    </div> --> 
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: 1px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/IMG_9557.JPG" alt="..." style="height: 525px; width: 100%;">
        <div class="carousel-caption">
          <h1>BEST RESTAURANT FOOD ORDERING SERVICES</h1>
          <h3>We deliver local foods featured with our restaurants to your doorsteps...</h3> 
        </div>
      </div>
    
      <div class="item">
        <img src="images/img_0647.jpg" alt="..." style="height: 525px; width: 100%;">
        <div class="carousel-caption">
          <h2 style="color: white;">WE OFFER THE BEST SERVICES</h2>
          <h4 style="color: white;">enjoy your breakfast, lunch and dinner</h4>
        </div>
      </div>

      <div class="item">
        <img src="images/1544708214060-w2880-c7.jpg" alt="..." style="height: 525px; width: 100%;">
        <div class="carousel-caption">
          <h1 style="color: black; font-size:50px; font-family: Comic sans MS;"><span class="fa fa-cutlery" style="color: red;"></span>.BLS</h1>
        </div>
      </div>
      
    </div>
    

  </div>
  </div>

  <!-- <div class="row">
    <div style="height: 100%; width: 100%;">
        <div class="signup_btn" style="float: left;">
          <button class="btn btn-primary" id="slide" data-toggle="modal" role="button" data-target="#signup"> Sign Up </button>
        </div>
        <div class="login_btn" style="float: left;">
          <button class="btn btn-primary" id="slide2" data-toggle="modal" role="button" data-target="#login"> Login </button>
        </div>
    </div>
  </div> -->
<div class="container">
  <div class="row">
    <div class="col-md-12" id="find_restaurant">
      <h2>Find Restaurants near you</h2>
      <p>order food online from local restaurants</p>
      <p><span class="fa fa-search" style="font-size: 40px;"></span></p>
    </div>
    
    <div class="input-group">
      <input type="text" class="form-control" placeholder="input location of desired restuarant">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
      </span>
    </div><!-- /input-group -->

  </div>

<!-- about section -->
      <section class="about text-center" id="about">
        <div class="container">
          <div class="row">
            <h2>about us</h2>
            <h4>We bring the best restaurants within closer, to make your ordering experience worth it by offering you breakfast, lunch and super, local and foreign foods</h4>

            <div class="col-md-4 col-sm-6">
              <div class="single-about-detail clearfix">
                <div class="about-img">
                  <img class="img-responsive" src="images/Untitled-1-759x500.jpg" alt="">
                </div>

                <div class="about-details">
                  <div class="pentagon-text">
                    <h1>D</h1>
                  </div>
                  <h3>Delivery</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="single-about-detail">
                <div class="about-img">
                  <img src="images/Depositphotos_75422841_m-2015.jpg" alt="">
                </div>

                <div class="about-details">
                  <div class="pentagon-text">
                    <h1>O</h1>
                  </div> 
                  <h3>Online Food Order</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="single-about-detail">
                <div class="about-img">
                  <img class="img-responsive" src="images/online-food-order-concept-vector.jpg" alt="">
                </div>

                <div class="about-details">
                  <div class="pentagon-text">
                    <h1>J</h1>
                  </div>

                  <h3>Join Us</h3>
                  <p>Create account with us for faster order Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section><!-- end of about section -->

      <section class="wayaroundthesite">
        <!-- <div class="container"> -->
        <div class="row">
          <!-- Article centered on the Page --> 
    
        <div class="col-md-12 twelve columns centered make-it-appear-top">
          <!-- Title --> 
          <h1>€asy steps to order any meal</h1>
          <ul class="list" style="text-align: center;">
            <li class=""><h3>Sign Up</h3></li>
            <li class=""><h3>Login</h3></li>
            <li class=""><h3>choose preferred restaurant</h3></li>
            <li class=""><h3>add food items of your choice to cart</h3></li>
            <li class=""><h3>checkout</h3></li>
          </ul>

                          
          <!-- Content --> 
        </div>
        </div>
        <!-- </div>  -->    
      </section>

      <section class="featured_products">
        <?php include 'food_cart.php';?>
      </section>


<!-- signup and login modal -->
      <div class="modal fade" id="signup">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
      <div class="modal-body">    
        <form role="form" method="POST" action="">
                          
          <div class="form-group">
            <label for="exampleInputname">Name</label>
            <input type="text" name = "name" class="form-control" id="exampleInputname" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Username</label>
            <input type="text" name = "username" class="form-control" id="exampleInputname" placeholder="username">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Password</label>
            <input type="password" name = "password" class="form-control" id="exampleInputname" placeholder="password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><span class="glyphicon glyphicon-envelope"></span> Email</label>
            <input type="email" name = "email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputphonenumber"><span class="fa fa-phone"></span> PhoneNumber</label>
            <input type="text" name = "phonenumber" class="form-control" id="exampleInputphonenumber" placeholder="PhoneNumber">
          </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" name="submit">Sign Up</button>
      </div>
      </form>
      </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <!-- login modal -->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
      <div class="modal-body">    
        <form role="form" method="POST" action="">
                          
          <div class="form-group">
            <label for="exampleInputname">Username</label>
            <input type="text" name = "username" class="form-control" id="exampleInputname" placeholder="username">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Password</label>
            <input type="password" name = "password" class="form-control" id="exampleInputname" placeholder="password">
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" name="login">Login</button>
      </div>
      </form>
      </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

</div>
<?php include "footer.php"; ?>
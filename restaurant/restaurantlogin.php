<?php
	session_start();
	include '../db/food_ordering.php';

	if (isset($_POST['submit'])) {
		$restaurant = $_POST['restaurant_name'];
		$password = $_POST['password'];
		$restaurant_password = md5($password);

		$login = "SELECT * FROM list_of_restaurants WHERE restaurant_name = '$restaurant' && restaurant_password = '$restaurant_password' LIMIT 1";
		$result = mysqli_query($con, $login);

		if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['restaurant_idd'] = $row['restaurant_idd'];
			header("location:restaurantdashboard.php");

		}else{
			echo "<script> alert ('invalid restaurant name or password') </script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Restaurant Login</title>

    <!-- Bootstrap CSS -->    
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../admin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../admin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../admin/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../admin/css/style.css" rel="stylesheet">
    <link href="../admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{
            background-image: url("../images/IMG_9557.JPG") !important;
            background-repeat: no-repeat;
            background-size: 100% 850px;
        }
        .login-form{
            opacity: 0.9 !important;
        }
    </style>
</head>

  <body>

    <div class="container">

      <form class="login-form" action="" method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" name="restaurant_name" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Login</button>
        </div>
      </form>
    </div>


  </body>
</html>
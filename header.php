<?php
session_start();
  // error_reporting(0);
  include 'db/food_ordering.php';

  $sql = "SELECT * FROM list_of_restaurants ORDER BY restaurant_idd ASC";
    $sqlresult = mysqli_query($con, $sql);
    $count =0;
    if(mysqli_num_rows($sqlresult)>$count){
        while($row = mysqli_fetch_assoc($sqlresult)){
            $id[] = $row['restaurant_idd'];
            $restaurant[] = $row['restaurant_name'];
            $count++;
        }
    }else{echo 'could not select' .mysqli_error($con);}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLS.com</title>

    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <!-- Bootstrap -->
    <link href="Css/css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/progressbar.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/progressbar.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Using Jquery -->
    <script>
    jQuery(document).ready(function($) {
        $('#sidebar-btn').click(function() {
            $('#sidebar').toggleClass('visible');
        });
    });
    </script>
    </head>
    <body>
      <div class="foodnav">
      <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background: #131313 !important; border: inherit; width: 100%; border-radius: none !important;">
        <div id="sidebar" style="background: #131313;"> 
            <div style="text-align: center; font-family: Comic sans MS; background:#131313; margin-top: 5px; color: white; font-size: 25px; border-bottom: 1px solid white;">Featured Restaurants</div>
              <div class="margin_of_link">
               <ul>
                  <?php for($x=0; $x<$count; $x++) {?>
                   <li class="link"><a href="showeachrestaurant.php?restaurant_idd=<?php echo $id[$x];?>"><?php echo $restaurant[$x]; ?></a></li>
                   <?php } ?>
               </ul>
               </div>
               <div id="sidebar-btn">
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
        </div>
          <div class="navbar-header navbar-right">
            <a class="navbar-brand" href="index.php"><span class="fa fa-home">Home</span></a>
            <a class="navbar-brand" href="#about" data-spy="scroll" data-target=".about"><span class="fa fa-book">About</span></a>
            <a class="navbar-brand" href="#" data-toggle="modal" role="button" data-target="#signup"><span class="fa fa-pencil">Sign-Up</span></a>
            <a class="navbar-brand" href="#" data-toggle="modal" role="button" data-target="#login"><span class="fa fa">Login</span></a>
            <a class="navbar-brand" href="#"><span class="fa fa-phone">Contact</span></a>
          </div>
          <!-- <div style="font-family: Comic sans MS; margin-left: 48%; font-weight:bold; color:white !important; font-size: 20px; "><span class="fa fa-cutlery"></span>.BLS</div> -->
        </nav>
      </header>
      </div>
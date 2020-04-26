<?php
	include 'header.php';
	if (!isset($_SESSION['user_id'])) {
		header('location:signup.php');
	}$mysession = $_SESSION['user_id']; 

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

    //  $sql1 = "SELECT * FROM menu";
    // $sqlresult1 = mysqli_query($con, $sql1);
    // $count1 =0;
    // if(mysqli_num_rows($sqlresult1)>$count1){
    //     while($row = mysqli_fetch_assoc($sqlresult1)){
    //         $id1[] = $row['restaurant_id'];
    //         $restaurant1[] = $row['restaurant'];
    //         $foodcat[] = $row['food_category'];
    //         $food[] = $row['food'];
    //         $price[] = $row['price'];
    //         $foodimage[] = $row['food_image'];
    //         $count1++;
    //     }
    // }else{echo 'could not select' .mysqli_error($con);} //try nest another select
    //$_SESSION['rest_id'] = $id[$x];
?>
<style type="text/css">
        body{
            background-image: url("images/84228352-nigerian-food-buffet.jpg") !important;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .login-form{
            opacity: 0.9 !important;
        }
        .dark-bg:hover{
            background-color: #3a9dca;
        }
    </style>
    <div class="row">
        <div class="well well-md" style="font-size: 30px; font-family:Comic Sans MS; text-transform: uppercase; font-weight: 600; text-align: center; margin-top: 10px; opacity: 0.8;">
            <p> Featured Restaurants with BLS </p>
        </div>
    </div>
    <div class="container">
        <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
            <div class="row">
            <?php for($x=0; $x<$count; $x++) {?>
                <a href="showeachrestaurant.php?restaurant_idd=<?php echo $id[$x];?>"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="info-box dark-bg" style="margin-top: 5px; /*border-radius: 20px;*/ border-top-left-radius: 20px; border-top-right-radius: 20px; opacity: 0.9;">
                        <i class="fa fa-cutlery"></i>
                        <div class="title"><?php echo $restaurant[$x]; ?></div>                
                    </div><!--/.info-box-->         
                </div></a> <!--/.col-->
                <?php }?>
            </div><!--/.row-->
          </section>
      </section>
    </div>
    
<?php include "footer.php";?>

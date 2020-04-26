<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLS</title>

    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <!-- Bootstrap -->
    <link href="Css/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="Css/progressbar.css" rel="stylesheet">
    <script src="js/jquery-2.2.3.js"></script>
     <script src="js/jquery-1.11.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/progressbar.js"></script>

    <!-- Using Jquery -->
    <script>
    jQuery(document).ready(function($) {
        $('#sidebar-btn').click(function() {
            $('#sidebar').toggleClass('visible');
        });
    });
    // $('#demo').progressBar();
    // $(document).ready(function () {
    //             $('.link a').each(function (index) {
    //                 if (this.href.trim() == window.location) {

    //                     $(this).addClass('activeClass');
    //                 }
    //             });
    //         });
    </script>
</head>
<body>
   <div id="sidebar"> 
    <div style="text-align: center; font-family: Comic sans MS; color: white; margin-top: 45px; font-size: 25px;">Available restuarants</div>
      <div class="margin_of_link">
       <ul>
           <li class="link"><a href="#">Mumies</a></li>
           <li class="link"><a href="#">Divinefavour</a></li>
           <li class="link"><a href="#">Frenzy</a></li>
           <li class="link"><a href="#">11:45</a></li>
           <li class="link"><a href="#">Old Carolina</a></li>
           <li class="link"><a href="#">Big ballers</a></li>
           <li class="link"><a href="#">Madam fresh</a></li>
       </ul>
       </div>
       <div id="sidebar-btn">
           <span></span>
           <span></span>
           <span></span>
       </div>
   </div>
   <!--  Pure javaScript -->
    <script>
   // var sidebarbtn = document.getElementById('sidebar-btn');
   // var sidebar = document.getElementById('sidebar');
   // sidebarbtn.addEventListener('click', function () {
   //  if(sidebar.classList.contains('visible')){
   //     sidebar.classList.remove('visible'); 
   //  }else {
   //      sidebar.className = 'visible';
   //  }
   // });
    </script>
</body>
</html>

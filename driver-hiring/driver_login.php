<?php
session_start();

if(isset($_SESSION['id'])) {
    header("Location: mybooking.php");
} else {
    //
}


//index.php
include"dbconfig.php";
$country = '';
$state = '';
$city = '';
$query = "SELECT * FROM country_state_city GROUP BY country ORDER BY country ASC";
$result = select($query);
while($row = mysqli_fetch_array($result))
{
 $country .= '<option value="'.$row["country"].'">'.$row["country"].'</option>';
 $state .=$row["state"];
 $city .=$row["city"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Driver Hiring</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
	  
 
</head>

<body>
    <!--============================= HEADER =============================-->
    <?php include "nav.php";?></br></br></br>
    <!-- SLIDER -->
    <section class=" d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <div class="alert alert-primary">
                                    <h2 style="font-weight:bold;color:#000 ; text-shadow: 2px 2px 4px #000000; text-shadow: 2px 2px 5px white;">Driver Login</h2>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section></br></br></br></br>
    
    <div class="container">
	<div class="row">
	<div class="col-lg-12" >
	<form action="a.php" method="post">
	<input type="text" class="form-control col-lg-5" name="email" required="required" placeholder="Email">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="password" class="form-control col-lg-5" name="password" required="required" placeholder="Password"></br>
   
   <input type="submit" class="btn btn-danger" name="Login" value="Login">
   </form>
   
   </br><a href="driver_reg.php"><input type="submit" class="btn btn-success"  value="Register">
	</a>
	</div>
	</div>
	
	
	</div></br></br></br></br></br></br></br></br></br></br></br>
	
	
	
    <footer class="main-block dark-bg text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright  2023 Listing. All rights reserved | This template is made with by DS
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->




    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "country")
   {
    result = 'state';
   }
   else
   {
    result = 'city';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>
    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
</body>

</html>

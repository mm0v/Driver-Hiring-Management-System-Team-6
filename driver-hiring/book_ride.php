<?php
include"dbconfig.php";
$query = "SELECT city FROM country_state_city"; 
$result = select($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="new/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="new/css/style.css" />

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});
</script>
</head>

<body>
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
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<div id="booking" class="section">
		<div class="section-center">
		<div class="d-flex flex-column align-items-center text-center"><div class="alert alert-primary text-center" style="width:800px; height:50px; font-size:18px"><div>
  <strong>Hire your Driver </strong>  </div>
</div></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-2">
					</div>
<div class="col-lg-8">
<div style="
  text-align: center;
  color: white;
  background: white;
  padding: 1rem;">
  
  <form class="form-inline" method="post" action="advance.php" >
  <select class="form-control col-lg-6" name="city">
  <?php while($r=mysqli_fetch_array($result))
  {
extract($r);	  
  ?>
  <option value="<?=$city?>" style="color:#07090A;font-weight:bold;font-size:16px"><?=$city?>
  </option><?php
  }
  ?>
  </select>
 
 <select class="form-control col-lg-6" name="vehical">
  
  <option style="color:#07090A;font-weight:bold;font-size:16px">Vehical Type
  </option>
  <option style="color:#07090A;font-weight:bold;font-size:16px">LMV
  </option>
  <option style="color:#07090A;font-weight:bold;font-size:16px">HMV
  </option>
  </select></br></br></br>
  <input type="submit" class="btn btn-primary btn-lg btn-block" name="booking" value="Book Now">
	
 </form>
  
  </div>
					</div>
<div class="col-lg-2">
					</div>

					</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
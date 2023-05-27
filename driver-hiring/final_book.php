<?php
include "dbconfig.php";
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
    <title>Driver Hiring</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
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
		<center><div class="alert alert-primary" style="width:800px; height:50px; font-size:18px"><center>
  <strong>Hire your Driver </strong>  </center>
</div></center>
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
  
  <form class="form" method="post"  >
  <input type="date" style="color:black;font-weight:bold" name="date" id="txtDate"  class="form-control"/> </br>
 <input type="text" style="color:#07090A; font-weight:bold" name="duration" placeholder="Booking Duration in Hours" class="form-control"></br>
 <input type="text" style="color:#07090A; font-weight:bold" name="name" placeholder="Name" class="form-control"></br>
 <input type="text" style="color:#07090A; font-weight:bold" name="mobile" placeholder="Mobile" class="form-control"></br>
 <input type="text" style="color:#07090A; font-weight:bold" name="email" placeholder="Email" class="form-control"></br></br></br></br>
  <input type="submit" class="btn btn-primary btn-lg btn-block" name="final_booking" value="confirm">
	
 </form>
  
  </div>
  <?php
  if(isset($_POST['final_booking']))
  {
	  $token = bin2hex(random_bytes(16));
	  extract($_REQUEST);
	$query="INSERT INTO `booking`(`city`, `date`, `duration`, `name`, `mobile`, `email`, `vehical`, `driverid`, `status`, `chat_token`)
	VALUES
	('$city', '$date', '$duration', '$name', '$mobile', '$email','$vehical','$driverid','0', '$token')";
	
	
	 $n=iud($query);
	 if($n==1)
	 {
        

        echo"
        <script>
        // Function to perform redirect
        function redirect(url) {
            window.location.href = url;
        }

        // Example usage
        redirect('http://localhost/Project/driver-hiring/user_chat.php?driverid={$driverid}&token={$token}');
        </script>";

        

	}
	else
		{
		 echo'<script>alert("Please Try Again, some error occured")
		 window.location = "driver_list.php?city='. $city .'&vehical='.$vehical.'";
              </script>';

	}
		
	 }
		 
		 
	 
 
  ?>
					</div>
<div class="col-lg-2">
					</div>

					</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
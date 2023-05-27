<?php
//index.php
// print_r($_POST);exit;

include"dbconfig.php";
$countryList = array();
$stateList = array();
$cityList = array();
$query = "SELECT * FROM country_state_city GROUP BY country ORDER BY country ASC";
$result = select($query);

while($row = mysqli_fetch_array($result))
{

    array_push($countryList, $row['country']);
    array_push($stateList, $row['state']);
    array_push($cityList, $row['city']);

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
                                    <h2 style="font-weight:bold;color:#000 ; text-shadow: 2px 2px 4px #000000; text-shadow: 2px 2px 5px white;">Driver Registration</h2>
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
	<form class="form-inline" enctype="multipart/form-data" method="post">
	<input type="text" class="form-control" name="driname" required="required" placeholder="Name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" class="form-control" name="age" required="required" placeholder="Age">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" class="form-control" name="address" required="required"  placeholder="Address">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" class="form-control"  name="mobile" required="required"  placeholder="Mobile"></br></br></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" class="form-control"  name="email" required="required"  placeholder="Email">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="password" class="form-control" name="password" required="required"   placeholder="Password">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
	<select class="form-control" name="lisence">
	<option>Select any</option>
	<option value="LMV">LMV</option>
	<option value="HMV" >HMV</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="charge" class="form-control" placeholder="charge per hour">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="country" id="country" class="form-control action selectpicker">
    <?php foreach ($countryList as $countries) { ?>
    <option value="<?=$countries;?>"><?=$countries;?></option>
    <?php }?>
   </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <select name="state" id="state" class="form-control action selectpicker">
   <?php foreach ($stateList as $states) { ?>
    <option value="<?=$states;?>"><?=$states;?></option>
    <?php }?>
   </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </br></br></br></br>
   <select name="city" id="city" class="form-control selectpicker">
    <?php foreach ($cityList as $cities) { ?>
        <option value="<?=$cities;?>"><?=$cities;?></option>
    <?php }?>
   </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="file" name="myimage" class="form-control" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <textarea class="form-control" name="discription">Description about driver...
   </textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="submit" class="btn btn-danger" name="register" value="Register">
	</form>
	<a href="driver_login.php"><button class="btn btn-success">Login</button></a>
	</div>
	</div>
	
	
	</div></br></br></br></br></br></br></br></br></br></br></br>
	<?php
	if(isset($_REQUEST['register']))
	{
		
	extract($_REQUEST);
	$error=$_FILES["myimage"]["error"];

$name=$_FILES["myimage"]["name"];
$type=$_FILES["myimage"]["type"];
$size=$_FILES["myimage"]["size"];
$tmp_name=$_FILES["myimage"]["tmp_name"];

    $password = md5($password);

	 $query="INSERT INTO `driver_register`
	(`name`, `age`, `address`, `mobile`, `email`, `password`,`lisence`, `charge`, `country`, `state`, `city`, `image`, `discription`)values
	('$driname', '$age', '$address', '$mobile', '$email', '$password','$lisence', '$charge', '$country', '$state', '$city', '$name', '$discription')";

	if(move_uploaded_file($tmp_name,"images/$name"))
	{
	$n=iud($query);
	 if($n==1)
	 {
		 
		 echo"<script>alert('Your Registration is Successfull');
		 </script>";
	 }
	
	}
	else
	{
		echo"Something Wrong";
	}


	}
	?>
	
	
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

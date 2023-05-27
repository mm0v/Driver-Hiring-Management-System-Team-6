<?php
//index.php
include"dbconfig.php";

if(!isset($_SESSION['id'])){header("Location: index.php");}

$query = "SELECT * FROM driver_register where id=".$_SESSION['id']."";
$query1 = "SELECT * FROM booking where driverid=".$_SESSION['id']."";

// echo $query;exit;

$result = select($query);
$result1 = select($query1);

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
                                    <div class="alert alert-info">
									<?php
									while($r=mysqli_fetch_array($result))
									{
									?>
                                    <h3 style="font-weight:bold;color:#FF2F6D ; text-shadow: 2px 2px 4px #000000; text-shadow: 2px 2px 5px white;">Welcome <?=ucwords($r[1])?></h3>
                                <?php
									}
								?>
								</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="logout.php"><div style="margin-left:30px"><button class="btn btn-danger">Logout</button></div></a></br></br>
    <div class="container-fluid">
	<div class="blank-page" id="display">
							<div class="row">
	<div class="col-lg-12" >
	<div class="col-lg-12" >
	<table class="table table-hover">
	<tr style="font-weight:bold">
	<td>Name</td>
	<td>Contact Number</td>
	<td>Date</td>
	<td>Duration</td>
	<td>Booking</td>
	<td>Chat</td>
	</tr>
	
	
	
	
	<?php
	//include"dbconfig.php";
	while($r=mysqli_fetch_array($result1))
	{
		extract($r);
	?>
	<tr>
	<td><?=$name?></td>
	<td><?=$mobile?></td>
	<td><?=$date?></td>
	<td><?=$duration?></td>
	
	
	<?php if($status==0){ ?>
					<td><a href="user.php?bid=<?=$b_id?>"><button class="btn btn-danger del_package" data-package_id="<?=$b_id?>" data-status="0"> Pending</button></a></td>
					<?php }
					else if($status==1) { ?>
					<td><a href="user2.php?bid=<?=$b_id?>&name=<?=$name?>&date=<?=$date?>"><button class="btn btn-warning del_package" data-package_id="<?=$b_id?>" data-status="1">Confirm</button></a></td>
					<?php } else { ?>
			
					<td><button class="btn btn-success del_package" data-package_id="<?=$b_id?>" data-status="2"> Booked</button></td>
					<?php } ?>
	
                    <td><a href="driver_chat.php?driverid=<?=$driverid;?>&token=<?=$chat_token;?>"><button class="btn btn-success"  data-status="0"> Chat</button></a></td>
	
	</tr>
    

	<?php
	}
	?>
    
	<table>
	</div>
	</div>
	
	
	</div>
						</div>
	</br></br></br></br></br></br></br></br></br></br></br>
	
	
	
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

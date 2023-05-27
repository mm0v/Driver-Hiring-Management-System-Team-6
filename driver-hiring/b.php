
<?php
include"dbconfig.php";

	  $bid= $_REQUEST['bookid'];
	  $did=$_REQUEST['driverid'];
	  
	  $query="UPDATE `booking` SET `driverid`='$did',`status`='0' WHERE b_id='$bid'";
	  $n=iud($query);
	  
	  if($n==1)
	  {
		 echo'<script>alert("Booking Successful")</script>';
		  header("location:index.php");

	  }
  ?>
<?php
include"dbconfig.php";
  if(isset($_REQUEST['booking']))
  {
	  extract($_REQUEST);
	$query="INSERT INTO `booking`(`city`, `date`, `duration`, `name`, `mobile`, `email`, `vehical`) VALUES
	('$city', '$date', '$duration', '$name', '$mobile', '$email','$vehical')";
	
	
	 $n=iud($query);
	 if($n==1)
	 {
		 echo $query="SELECT * FROM `booking`  where date='$date' and   mobile='$mobile' and email='$email'";
$result = select($query);
while($r=mysqli_fetch_array($result))
{
	extract($r);
	echo $b_id;
	echo $city;
	echo $vehical;
		 header("location:driver_list.php?id=$b_id&vehical=$vehical&city=$city");

	}
	 }
		 
		 
	 
  }
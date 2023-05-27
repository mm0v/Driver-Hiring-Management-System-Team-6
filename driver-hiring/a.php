<?php
include"dbconfig.php";
if(isset($_REQUEST['Login']))
	{
		
	$email=trim($_REQUEST['email']);
	$password=md5(trim($_REQUEST['password']));
	
	$valid=true;
	$query="select * from driver_register where email='$email' and password='$password'";
	
	
	
	if($valid)
	{
	$login_data=select($query);
	$n=mysqli_num_rows($login_data);
	if($n==1)
	{
		while($data=mysqli_fetch_array($login_data))
		{
		extract($data);
		
		}
		
		$_SESSION['id']=$id;
		header("location: mybooking.php");
			}
	else
	{
		echo"email or password is incorrect";
	}
	}
		
	}
    
  ?>
<?php
include"dbconfig.php";


		extract($_REQUEST);
		if(iud("UPDATE booking SET status = '1' WHERE b_id = '$bid' ")==1)
		{
			header("location:mybooking.php");
		}
	
?>
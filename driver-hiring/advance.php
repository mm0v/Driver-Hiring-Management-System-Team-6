
<?php
include"dbconfig.php";
  if(isset($_REQUEST['booking']))
  {
	  extract($_REQUEST);
	
		 header("location:driver_list.php?vehical=$vehical&city=$city");

	}
	
  
  #################################
  
	
  ######################################
  
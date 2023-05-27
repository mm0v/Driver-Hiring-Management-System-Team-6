<div class="row">
	<div class="col-lg-12" >
	<div class="col-lg-12" >
	<table class="table table-hover">
	<tr>
	<td>Name</td>
	<td>Contact Number</td>
	<td>Date</td>
	<td>Duration</td>
	<td>booking</td>
	</tr>
	
	
	
	
	<?php
	//include"dbconfig.php";
	$query1 = "SELECT * FROM booking where driverid=".$_SESSION['id']."";
	while($r=mysqli_fetch_array($result1))
	{
		extract($r);
	?>
	<tr>
	<td><?=$name?></td>
	<td><?=$mobile?></td>
	<td><?=$date?></td>
	<td><?=$duration?></td>
	
	
	<?php if($status==1){ ?>
					<td><button class="btn btn-success del_package" data-package_id="<?=$b_id?>" data-status="0"> Confirm</button></td>
					<?php } else { ?>
					<td><button class="btn btn-warning del_package" data-package_id="<?=$b_id?>" data-status="1"> Panding</button></td>
					<?php } ?>
	
	</tr>
	<?php
	}
	?>
	<table>
	</div>
	</div>
	
	
	</div>
<?php
include_once("./Cr4slolo.php");


    
session_start();

if($_SESSION['username'] == ""){die();}

include('../classes/db.php');
$db = new Db();
$db->tableName = 'driver_register';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(strip_tags($_POST['name']) == "") {
		echo "Please add username";
	} else {
		$content = "New Driver Added( " . $_POST['name'] . " )";

		$data = array(
            "name" => strip_tags($_POST['name']),
            "age" => strip_tags($_POST['age']),
            "address" => strip_tags($_POST['address']),
            "mobile" => strip_tags($_POST['mobile']),
            "email" => strip_tags($_POST['email']),
            "lisence" => strip_tags($_POST['lisence']),
            "password" => md5(strip_tags($_POST['password'])),
            "charge" => strip_tags($_POST['charge']),
            "country" => strip_tags($_POST['country']),
            "state" => strip_tags($_POST['state']),
            "state" => strip_tags($_POST['state']),
            "city" => strip_tags($_POST['city']),
            "discription" => strip_tags($_POST['discription']),
		);
		$result = $db->insert($data);

		

		
		if($result == "success") {
			$db->tableName = 'notifications';
			$data = array(
				"content" => $content,
				"who_added" => $_SESSION["username"]
			);
			$db->insert($data);
			$content = $content . '. ' . 'Made the change by: ' . $_SESSION['username'];
			header("Location: ../driveredit.php");
		} 
		
	}
}







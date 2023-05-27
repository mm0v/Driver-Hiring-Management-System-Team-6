<?php
include_once("./Cr4slolo.php");

session_start();

if($_SESSION['username'] == ""){die();}


include('../classes/db.php');
$db = new Db();

$db->tableName = 'cred_users';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if($_POST['username'] == "") {
		echo "Please add username";
	} else {
		$content = "New User Added( " . $_POST['username'] . " )";
		$data = array(
			"username" => strip_tags($_POST['username']),
			"password" => md5($_POST['password']),
			"role" => strip_tags($_POST['role']),
			"access" => strip_tags($_POST['access']),
			"active" => strip_tags($_POST['active']),
		);
		$result = $db->insert($data);
		
		
		if($result == "success") {
			$db->tableName = 'notifications';
			$data = array(
				"content" => $content,
				"who_added" => $_SESSION["username"]
			);
			$db->insert($data);
			$content = $content . '. \n' . 'Made the change by: ' . $_SESSION["username"];

			header("Location: ../userconfig.php");
		} 
		
	}
}







<?php
include_once("./Cr4slolo.php");

session_start();

if($_SESSION['username'] == ""){die();}

    include('../classes/db.php');

    $db = new Db();
    
    $db->tableName = 'cred_users';
    $user = $db->select(strip_tags($_GET['id']));
    $content = "User Deleted ( " . $user[0]['username'] . " )";
    $result = $db->delete($_GET['id']);


		
		if($result == "success") {
        $db->tableName = 'notifications';
			$data = array(
				"content" => $content,
				"who_added" => $_SESSION["username"]
			);
			$db->insert($data);
            $content = $content . '. ' . 'Made the change by: ' . $_SESSION['username'];
			header("Location: ../userconfig.php");
		} else {
            echo 'Error occured';
        }






?>



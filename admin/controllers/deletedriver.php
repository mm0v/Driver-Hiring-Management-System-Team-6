<?php
include_once("./Cr4slolo.php");

    session_start();
    include('../classes/db.php');


    $db = new Db();
    $db->tableName = 'driver_register';
    $hostname = $db->select(strip_tags($_GET['id']));

		$content = "Driver Deleted ( " . $hostname[0]['ip_addess'] . " )";
    $result = $db->delete($_GET['id']);

		
		if($result == "success") {
      $db->tableName = 'notifications';
			$data = array(
				"content" => $content,
				"who_added" => $_SESSION["username"]
			);
			$db->insert($data);
      $content = $content . '. ' . 'Made the change by: ' . $_SESSION["username"];
			header("Location: ../editdriver.php");
		} else {
            echo 'Error occured';
        }






?>



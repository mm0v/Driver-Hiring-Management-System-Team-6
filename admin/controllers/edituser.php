<?php
include_once("./Cr4slolo.php");



session_start();

if($_SESSION['username'] == ""){die();}

include ('../classes/db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']) && !empty($_POST['password'])){
$username = strtolower(strip_tags($_POST['username']));
$password = strip_tags($_POST['password']);

$db = new db();

$db->tableName = 'cred_users';

$user = $db->select(strip_tags($_GET['id']));


$content = "User Edited Added( " . $user[0]['username'] . " )";


$data = array(
    "id" => strip_tags($_POST['id']),
    "username" => strip_tags($_POST['username']),
    "password" => md5($_POST['password']),
);
$result = $db->update($data);

if($result == "success") {
    $db->tableName = 'notifications';
			$data = array(
				"content" => $content,
				"who_added" => $_SESSION["username"]
			);
			$db->insert($data);
            $content = $content . '. ' . 'Made the change by: ' . $_SESSION['username'];
    header("Location: ../userconfig.php");
} 
}

?>

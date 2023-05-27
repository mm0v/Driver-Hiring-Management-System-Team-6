<?php
include_once("./Cr4slolo.php");

session_start();

if($_SESSION['username'] == ""){die();}

include ('../classes/db.php');



if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id']) && !empty($_SESSION['username'])){
$username = strtolower(strip_tags($_POST['username']));
$password = strip_tags($_POST['password']);

$db = new db();

$db->tableName = 'cred_users';

$user = $db->select(strip_tags($_POST['id']));


$content = "User Conifg Edited( " . $user[0]['username'] . " )";


if(!empty($_POST['password'])) {
    $data = array(
        "id" => strip_tags($_POST['id']),
        "username" => strip_tags($_POST['username']),
        "password" => md5($_POST['password']),
        "role" => strip_tags($_POST['role']),
        "access" => strip_tags($_POST['access']),
        "active" => strip_tags($_POST['active']),
    );
} else {
    $data = array(
        "id" => strip_tags($_POST['id']),
        "username" => strip_tags($_POST['username']),
        "role" => strip_tags($_POST['role']),
        "access" => strip_tags($_POST['access']),
        "active" => strip_tags($_POST['active']),
    );
}




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
} else {
    echo 'error occured';
}
}

<?php
include_once("./Cr4slolo.php");




session_start();
if(time()-$_SESSION["time_stamp"] > 900){
    header("Location: ./controllers/logout.php");

} else {
       // DO NOTHING
}

include ('../classes/db.php');


if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['password'])){
$username = strip_tags($_POST['name']);
$password = strip_tags($_POST['password']);

$db = new db();

$db->tableName = 'driver_register';


$content = "Driver Edited( " . $_POST['name'] . " )";


$data = array(
    'id' => strip_tags($_POST['id']),
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

$result = $db->update($data);

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

?>

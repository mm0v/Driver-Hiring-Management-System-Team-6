<?php
#include_once("./Cr4slolo.php");
include_once('./Cr4slolo.php');

#set_include_path(dirname(__FILE__)."/../");
date_default_timezone_set("Asia/Dubai");



session_start();
include('../classes/user.php');






$db = new Db();



$ipAddr = $_SERVER["REMOTE_ADDR"];
$db->tableName = 'loginlogs';
$data = array(
	"ip_addr" => $ipAddr,
);


$result = $db->insert($data);
$loginCount = $db->selectCount($ipAddr);

$loginAccess = true;


if($loginCount[0]['count'] == 3){

    

    $content = 'Warning: 3 failed login attempt on "' . $ipAddr . '".' . 'at: ' . $date = date('d/m/Y h:i:s a', time());;

  

} elseif($loginCount[0]['count'] > 3){
    echo 'too many attempt';
    $db->tableName = 'loginlogs';
    $ipAddr = $_SERVER["REMOTE_ADDR"];
    $ip_details = $db->selectIp($ipAddr);

    $timestamp = $db->selectCount($ipAddr);
    
    

    if($timestamp[0]['count'] < 3){
        $loginAccess = true;
        $loginCount[0]['count'] = 0; 
    } else {
        $loginAccess = false;
        echo $loginAccess;

    }
    
} else {
  //do nothing
}




if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']) && !empty($_POST['password']) && $loginAccess){

  $username = strtolower(strip_tags($_POST['username']));
  $password = strip_tags($_POST['password']);

  $user = new User();

  $row = $user->isLoggedIn($username, $password);

  // check if user correct or not
  if(!empty($row) || $row !== 0){

        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header('location: ../index.php');
        $_SESSION['login'] = 0;
  } else{

    header("location: ./../signin.php");

  }

} else {

  header("location: ../index.php");
  $_SESSION['message'] = 'Please Log in';

}

?>

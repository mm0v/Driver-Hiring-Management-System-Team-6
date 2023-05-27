<?php
//include_once("./Cr4slolo.php");

$_SESSION = [];
session_destroy();
header('Location: ../signin.php');
?>

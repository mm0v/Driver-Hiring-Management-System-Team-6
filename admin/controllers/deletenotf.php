<?php
include_once("./Cr4slolo.php");

    include("../classes/db.php");
    $db = new Db();
    $db->tableName = 'notifications';
    $notfList = $db->selectOnly();
    foreach ($notfList as $notf) {
        $result = $db->delete($notf['id']);    
    }
    header("Location: ../index.php");
?>
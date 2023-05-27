<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiring-driver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $senderId = $_GET["sender_id"];
    $receiverId = $_GET["receiver_id"];

    $sql = "SELECT * FROM messages WHERE (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId') ORDER BY timestamp ASC";
    $result = $conn->query($sql);
    

    $messages = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    echo json_encode($messages);
}

$conn->close();
?>
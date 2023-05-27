<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiring-driver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $senderId = $_POST["sender_id"];
    $receiverId = $_POST["receiver_id"];
    $message = $_POST["message"];

    $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ('$senderId', '$receiverId', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
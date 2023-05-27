<?php 
session_start();

if(isset($_GET['driverid']) || isset($_GET['token'])){
    $_SESSION['driverid'] = $_GET['driverid'];
    $_SESSION['token'] = $_GET['token'];
} else {
    // do nothing
}




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiring-driver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM booking WHERE chat_token={$token}";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Driver Hiring</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>

#chatbox {
            width: 400px;
            height: 400px;
            border: 1px solid #ccc;
            overflow-y: scroll;
            padding: 10px;
        }

        #messageForm {
            margin-top: 10px;
        }

        #message {
            width: 300px;
            padding: 5px;
        }

        #sendButton {
            padding: 5px 10px;
        }

        .message {
            margin-bottom: 10px;
        }

        .message p {
            margin: 0;
            padding: 5px;
        }

        .sender {
            background-color: #eaeaea;
        }

        .receiver {
            background-color: #d2f1ff;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to send a message
        function sendMessage(senderId, receiverId, message) {
            $.post("sendMessage.php", {
                sender_id: senderId,
                receiver_id: receiverId,
                message: message
            }, function(data) {
                console.log(data);
            });
        }

        // Function to retrieve messages
        function getMessages(senderId, receiverId) {
            $.get("getMessages.php", {
                sender_id: senderId,
                receiver_id: receiverId
            }, function(data) {
                var messages = JSON.parse(data);
                var chatbox = $("#chatbox");

                chatbox.empty();
                for (var i = 0; i < messages.length; i++) {
                    var message = messages[i];
                    var sender = message.sender_id == senderId ? "You" : "Client";
                    chatbox.append("<p><strong>" + sender + ":</strong> " + message.message + "</p>");
                }
            });
        }

        // Function to handle form submission
        function handleSubmit(event) {
            event.preventDefault();
            var senderId = <?=$_SESSION['driverid']?>; // Replace with the actual sender ID
            var receiverId = "<?=$_SESSION['token']?>" // Replace with the actual receiver ID
            var messageInput = $("#message");
            var message = messageInput.val();

            sendMessage(senderId, receiverId, message);
            messageInput.val("");
            getMessages(senderId, receiverId);
        }

        $(document).ready(function() {
            var senderId = <?=$_SESSION['driverid']?>; // Replace with the actual sender ID
            var receiverId = "<?=$_SESSION['token']?>"; // Replace with the actual receiver ID

            // Initial retrieval of messages
            getMessages(senderId, receiverId);

            // Form submission event listener
            $("#messageForm").submit(handleSubmit);
        });
    </script>





</head>

<body>
    <?php include "nav.php";?>

    <!-- <?php if(!isset($_POST['submit']) || !isset($_GET['token'])) : ?>
    <div class="container">
    <br>
            <br><br><br><br>
	    <div class="row">
            
	        <div class="col-lg-12" style="margin: left-50px">
            <form class="form" method="post">
                    <input type="text" style="color:#07090A; font-weight:bold" name="duration" placeholder="Enter Token to chat with Driver" class="form-control"></br>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name=submit>
                
            </form>
            <br><br><br><br>

            </div>
        </div>
	</div>
    <?php endif; ?> -->

    <?php if(isset($_POST['submit']) || isset($_SESSION['token'])) : ?>
    <div class="container">
    <br>
            <br><br><br><br>
	    <div class="row">
            <div id="chatbox"></div>
                <form id="messageForm">
                    <input type="text" id="message" placeholder="Type a message" required>
                    <input type="submit" value="Send" class="btn btn-primary btn-lg btn-block">
                </form>
        </div>
    </div>
    <br><br>
    <?php endif; ?>




    <!--============================= FOOTER =============================-->
    <footer class="main-block dark-bg text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright  2023 Listing. All rights reserved | This template is made with by DS
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
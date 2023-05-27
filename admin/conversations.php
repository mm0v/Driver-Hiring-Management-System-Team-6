<?php
session_start();
include('./classes/db.php');

if(time()-$_SESSION["time_stamp"] > 900){
     header("Location: ./controllers/logout.php");

} else {
        // DO NOTHING
}

$conn = new Db();
$conn->tableName = 'cred_users';

$user_cred = $conn->select($_SESSION['id']);

$all_users = $conn->selectOnly();






 

if(time()-$_SESSION["time_stamp"] > 900){
     header("Location: ./controllers/logout.php");

} else {
        // DO NOTHING
}
 





    $conn->tableName = 'messages';

    $list = $conn->selectOnly();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Driver Hiring Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="./assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">



    <link href="./assets/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-icons.css" rel="stylesheet">





    <!-- Libraries Stylesheet -->
    <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./assets/css/style.css" rel="stylesheet">
</head>











<body>
<?php include_once('./templates/sidebar.php');   ?> 

<div class="container-fluid position-relative d-flex p-0">
    <div class="content">
        <?php include_once('./templates/navbar.php');   ?>    
        
        <div class="container-fluid pt-4 px-4">
        <div class="text-center rounded">

        <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Conversation List</h6>
                    </div>

                    <div class="table-responsive">

                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="hostTable">
                            
                            <thead>
                                <tr class="text-primary">
                                    <th scope="col">ID</th>
                                    <th scope="col">Sender ID</th>
                                    <th scope="col">Receiver ID</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Timestamp</th>

                                </tr>
                            </thead>

                            <tbody class="text-white">
                            <br>
                                
                                <?php
                                foreach ($list as $row) 
                                    { 
                                        $sender_id=$row['sender_id'];
                                        $receiver_id=$row['receiver_id'];
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . "<a href='bookings.php?id={$sender_id}'>"  . $row['sender_id'] . '</a></td>';
                                        echo '<td>' . "<a href='bookings.php?id={$receiver_id}'>"  . $row['receiver_id'] . '</a></td>';
                                        echo '<td>' . $row['message'] . '</td>';
                                        echo '<td>' . $row['timestamp'] . '</td>';
                                        echo '</tr>';
                                    }




                            
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





















        </div>
        </div>
    

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#" target="_blank">Driver Hiring</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed and developed By Group Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script> -->
    
    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script  src="./assets/js/bootstrap.bundle.min.js"></script>



    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script  src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/lib/chart/chart.min.js"></script>
    <script src="./assets/lib/easing/easing.min.js"></script>
    <script src="./assets/lib/waypoints/waypoints.min.js"></script>
    <script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="./assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/costum.js"></script>

</body>

</html>


<?php 
date_default_timezone_set('Asia/Dubai');





session_start();
if(!empty($_SESSION['username'])){  
} else {
    header("location: signin.php");
    exit;
}
include("./classes/db.php");







if(!isset($_SESSION['time_stamp'])){
	$_SESSION["time_stamp"] = time();
 } else {

   if(time() - $_SESSION["time_stamp"] > 900){
     header("Location: ./controllers/logout.php");

   } else {
     // DO NOTHING
   }
 }

$conn = new Db();


$conn->tableName = 'cred_users';
$user_cred = $conn->select($_SESSION['id']);





if($user_cred[0]['role'] == 'guest'){
    $conn->tableName = 'cred_details';
    $str_arr = preg_split ("/\,/", $user_cred[0]['access']); 
    
    foreach($str_arr as $str){
        // array_push($host_cred,$conn->select($str));

        $host_cred[] = $conn->select($str);

    }

} else {
    $conn->tableName = 'driver_register';

    $host_cred = $conn->selectOnly();
}



?>


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
    
    
    <link href="./assets/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-icons.css" rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">



    <!-- Libraries Stylesheet -->
    <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <script src="./assets/js/costum.js"></script>
    <script src="./assets/js/jquery-3.4.1.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./assets/css/style.css" rel="stylesheet">
</head>











<body>
    

    
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <?php include_once('templates/sidebar.php'); ?>


        <!-- Content Start -->
        <div class="content">
            <?php include_once('templates/navbar.php'); ?>






            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Driver List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="hostTable">
                            <thead>
                                <tr class="text-primary">
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">License</th>
                                    <th scope="col">Charge</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Desctiption</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                <?php
                                    
                                foreach($host_cred as $row){
                                    
                                        
                                        echo '<tr class="text-white">';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['age'] . '</td>';
                                        echo '<td>' . $row['address'] . '</td>';
                                        echo '<td>' . $row['mobile'] . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . $row['lisence'] . '</td>';  
                                        echo '<td>' . $row['charge'] . ' $</td>';  
                                        echo '<td>' . $row['country'] . '</td>';  
                                        echo '<td>' . $row['state'] . '</td>';  
                                        echo '<td>' . $row['city'] . '</td>';  
                                        echo '<td>' . $row['image'] . '</td>';  
                                        echo '<td>' . $row['discription'] . '</td>';  
                                        echo '</tr>';
                                    
                                }
                            
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


          


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#" target="_blank">Driver Hiring</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed and developed By Group-name</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->





    <script src="./assets/js/costum.js"></script>
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

</body>

</html>

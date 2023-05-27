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

    
    $user_cred = $conn->select($_GET['id']);


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
                <form action="./controllers/edituserconfig.php" method="POST">
                        <div class="container-fluid pt-4 px-4 text-white">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">User configuration change menu</h6>
                                <p class="text-primary">Warning: Please pay attention to config changes. It can harm the system!!!!</p>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-primary" id="floatingInput" value="<?= $user_cred[0]['id'];?>" name="id" readonly>
                                    <label for="floatingInput" class="text-primary">ID</label>
                                </div>
                                
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-white" id="floatingInput" value="<?= $user_cred[0]['username'];?>" name="username">
                                    <label for="floatingInput" class="text-white">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control text-white" id="floatingInput" name="password">
                                    <label for="floatingInput" class="text-white">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-primary" id="floatingInput" value="<?= $user_cred[0]['date_created'];?>" readonly>
                                    <label for="floatingInput" class="text-primary" readonly>Date of Created</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="<?= $user_cred[0]['role'];?>" name="role">
                                    <label for="floatingInput" class="text-primary" >Role</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="<?= $user_cred[0]['access'];?>" name="access">
                                    <label for="floatingInput" class="text-primary" >Access</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="<?= $user_cred[0]['active'];?>" name="active">
                                    <label for="floatingInput" class="text-primary" >Status</label>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Change</button>
                                
                                
                                
                            </div>
                        </div>
                    </form>


            </div>
            </div>
        </div>
    </div>
</body>

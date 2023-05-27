<?php
    session_start();

if(time()-$_SESSION["time_stamp"] > 900){
     header("Location: ./controllers/logout.php");

} else {
        // DO NOTHING
}


include('./classes/db.php');

    $conn = new Db();
    $conn->tableName = 'cred_users';

    $user_cred = $conn->select($_SESSION['id']);

    

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
                <form action="./controllers/adddriver.php" method="POST">
                        <div class="container-fluid pt-4 px-4 text-white">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Driver Add menu</h6>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-white" id="floatingInput" name="name">
                                    <label for="floatingInput" class="text-white">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control text-white" id="floatingInput" name="age">
                                    <label for="floatingInput" class="text-white">Age</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="address">
                                    <label for="floatingInput" class="text-white" >address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"  name="mobile">
                                    <label for="floatingInput" class="text-white" >mobile</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email">
                                    <label for="floatingInput" class="text-white" >Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="lisence">
                                    <label for="floatingInput" class="text-white" >License</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" name="password">
                                    <label for="floatingInput" class="text-white" >Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="charge">
                                    <label for="floatingInput" class="text-white" >Charge</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="country">
                                    <label for="floatingInput" class="text-white" >Country</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="state">
                                    <label for="floatingInput" class="text-white" >State</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="city">
                                    <label for="floatingInput" class="text-white" >city</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="discription">
                                    <label for="floatingInput" class="text-white" >Description</label>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="submit">Add</button>
                                
                                
                                
                            </div>
                        </div>
                    </form>

                </div>
                </div>
            </div>
    </div>
</body>

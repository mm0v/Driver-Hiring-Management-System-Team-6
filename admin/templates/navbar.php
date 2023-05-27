<?php 

    $db = new Db();

    $db->tableName = "notifications";

    $notifications = $db->selectOnly();

    


?>





<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input id="hostInput" class="form-control bg-dark border-0" type="text" placeholder="Search" onkeyup="hostSearch()" >
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">notifications</span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="./controllers/deletenotf.php" class="dropdown-item text-center">Delete all notifications</a>

                            <?php foreach($notifications as $notification): ?>

                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0"><?= $notification['content'] ?></h6>
                                <small><?= $notification['added_date'] ?></small>
                                <h6 class="fw-normal mb-0"><?= $notification['who_added'] ?></h6>
                            </a>
                            <br>                            
                            <?php endforeach; ?>

                            <hr class="dropdown-divider">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="assets/img/admin.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION['username'];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="./profile.php" class="dropdown-item">Settings</a>
                            <a href="./controllers/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
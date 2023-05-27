<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Driver Hiring</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="assets/img/admin.png" alt="" style="width: 40px; height: 40px;">
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION["username"];?></h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link  <?php if($_SERVER['REQUEST_URI'] == '/index.php'){echo 'active';} ?>"><i class="fa fa-taxi me-2"></i>Driver List</a>
                    <a href="userconfig.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/userconfig.php'){echo 'active';} ?>"><i class="fa fa-user-edit me-2"></i>User Config</a>
                    <a href="driveredit.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/driveredit.php'){echo 'active';} ?>"><i class="fa fa-id-card me-2"></i>Driver Edit</a>
                    <a href="conversations.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/conversations.php'){echo 'active';} ?>"><i class="fa fa-envelope me-2"></i>Conversations</a>
                    <a href="bookings.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/bookings.php'){echo 'active';} ?>"><i class="fa fa-envelope me-2"></i>Bookings</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
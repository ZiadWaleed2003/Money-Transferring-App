<!-- Content Start -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-nav align-items-center ms-auto">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?php
                    echo $_SESSION['user']['image_path'];
                    ?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">
                        <?php
                        echo $_SESSION['user']['name'];
                        ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="user-acct-view.php" class="dropdown-item">My Profile</a>
                    <a href="#" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>


<!-- Navbar End -->
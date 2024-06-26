<!-- Content Start -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require_once ("../../models/User.php") ?>

<?php
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
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
                    <img class="rounded-circle me-lg-2" src="<?php echo $user->getImagePath() ?>" alt=""
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">
                        <?php
                        echo $user->getName();
                        ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="user-acct-view.php" class="dropdown-item">My Profile</a>
                    <a href="../../controllers/LogoutController.php" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>


    <!-- Navbar End -->

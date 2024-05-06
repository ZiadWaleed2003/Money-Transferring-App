<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require_once "../../views/main-components/header.php" ?>
<?php require_once "../../views/main-components/side-navbar.php" ?>
<?php require_once "../../views/main-components/navbar.php" ?>
<?php require_once "../../models/User.php";
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
$user->deleteAccount()
?>



<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center">
            <h1 class="font-weight-bold">El bab yoos3 gaml. tare2k zera3y ya bro!</h1>
            <?php
            $user->logOut();
            ?>
        </div>
    </div>
</div>
<!-- blank End -->


<?php require_once "../../views/main-components/footer.php" ?>








?>
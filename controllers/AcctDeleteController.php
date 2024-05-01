<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/main-components/header.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/main-components/side-navbar.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/main-components/navbar.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/models/User.php";
$active_user_id = 706; #TODO: replace with user id from sessions
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


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/main-components/footer.php" ?>








?>

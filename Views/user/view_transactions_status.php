<?php
session_start(); //EDITS AFTER SESSION
// session_destroy();

//EDITS AFTER SESSION
if (!isset($_SESSION['user']['id'])) {
    $_SESSION['user']['id'] = 1;
}
// var_dump($_SESSION['transaction']);
?>
<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>



<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        <div class="col-12 text-center header">
            <h3 class="display-3 pt-5">Transactions</h3>
        </div>

        <div class="col-12 text-center">
            <span id="links-tracking">
                <a href="transactions.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="send-money.php" class="h5 text-primary">Send Money</a>

            </span>
        </div>
        <div id="transaction-section-content" class="container-fluid">
            <div id="send-money-page" class="row justify-content-center">
                <div class="bg-secondary rounded h-100 p-4 col-10 text-center">

                    <div class="text-center pb-4">
                        <!-- <img width="200" src="../assets/img/cancelled transaction status.png"> -->
                        
                        <img width="200" src="../assets/img/done transaction status.png">
                    </div>
                    <div class="container">

                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">
                                <h3 class="text-light">Transaction ID: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <h2 class="text-success">&nbsp;123456123456</h2>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">                                
                                <h3 class="text-light">Sender Name: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <h2 class="text-success">&nbsp;Zeyad Tarek</h2>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Receiver Name: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <h2 class="text-success">&nbsp;ZZeyad TTarek</h2>
                            </div>

                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Date: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <h2 class="text-success">&nbsp;12-12-2024 11:30:13</h2>
                            </div>

                        </div>
                        <div class="d-flex align-items-baseline justify-content-center g-5">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Amount: </h3>
                            </div>
                            <div class="col-6 d-flex align-items-baseline justify-content-start ps-2">
                                <h2 class="text-success">&nbsp;1234</h2>
                                <span class="h5 text-success"> E£</span>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">

                        <a href="transactions.php">
                            <button type="button" class="btn btn-primary rounded-pill m-2">back to home</button>
                        </a>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Blank End -->


    <?php require_once("../main-components/footer.php") ?>
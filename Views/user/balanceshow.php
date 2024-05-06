<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['keep_transaction_session'] = true;
?>

<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>

<?php
    $amount = $_SESSION["transaction"]["check_balance"];
?>




<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        <div class="container back-to-previous" onclick="window.history.back()">
            <a class="text-decoration-underline"><i class="bi bi-chevron-left me-1"></i>back</a>
        </div>

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Transactions</h3>
        </div>

        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="index.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="transactions.php" class="h5">Transaction</a>
                &nbsp;
                /
                &nbsp;
                <a href="checkbalance.php" class="h5">Check Balance</a>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary">Balance Amount</a>

            </span>
        </div>

        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">

                <div class="card-number text-center pb-3">
                    <span class="text-light h4">Card number:</span>
                    <span class="text-muted h4">&nbsp;1234 xxxx xxxx 5678</span>
                </div>

                <div class="row m-auto pt-4 pb-4 bg-light col-6">
                    <div class="text-center">
                        <span class=" h1 display-6 text-black-50">Amount: &nbsp;</span>
                        <span class="h1 display-3 text-white">
                            <?php
                            echo $amount;
                            ?>
                        </span>
                        <span class="h4">E£</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- blank End -->

<?php require_once("../main-components/footer.php") ?>
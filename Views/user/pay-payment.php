<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php require("../../controllers/CRUD.php"); ?>
<?php require("../../Models/Formation.php"); ?>


<!-- Transaction Start -->
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
                <a href="pay-payment.php" class="h5 text-primary">Pay Payment</a>

            </span>
        </div>

        <div id="transaction-section-content" class="container-fluid pt-5">
            <div id="send-money-page" class="row justify-content-center">
                <div class="bg-secondary rounded h-100 p-4 col-10">

                    <form method="POST" action="../../controllers/TransactionsController.php">
                        <div class="mb-3">
                            <label for="" class="form-label h4">Select Your Card</label>
                            <select class="form-select form-select-lg mb-3" name="transaction_sender_card_id" aria-label=".form-select-lg example" required>
                                <option value="" class="text-muted" selected disabled>-- Open Cards list --</option>
                                <?php
                                $cards = CRUD::Select("SELECT * FROM usercards WHERE user_id = " . $_SESSION['user']['id'] . " order by favourite desc");
                                foreach ($cards as $card) {
                                    $card_number = Formation::showCardNumber($card['number']);
                                    $classes = ($card['favourite'] == 1) ? "bg-danger text-white" : "";

                                    echo "<option value='$card[id]' class='$classes'>$card_number</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <label for="" class="form-label h4">Select Payment</label>
                                <select class="form-select form-select-lg mb-3" name="transaction_bill_account_number" aria-label=".form-select-lg example" required>
                                    <option value="" class="text-muted" selected disabled>-- Open payments list --</option>
                                    <?php
                                    $bills = CRUD::Select("SELECT * FROM bills");
                                    foreach ($bills as $bill) {
                                        $bill_account_number = $bill['account_number'];
                                        $bill_name = Formation::capitalizeWords($bill['name']);

                                        echo "<option value='$bill_account_number' class=''>$bill_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label h4">Amount</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="amount" name="transaction_amount" placeholder="12345" class="form-control form-control-lg" aria-label="Amount (to the nearest dollar)" required>
                                    <span class="input-group-text ">E£</span>
                                </div>
                            </div>
                        </div>

                        <?php
                        // 
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }; //EDITS AFTER SESSION

                        if (isset($_SESSION['transaction']['error_message'])) :
                        ?>
                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <?php
                                echo $_SESSION['transaction']['error_message'];
                                unset($_SESSION['transaction']['error_message']);
                                ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" name="transaction_type" value="bill">

                        <div class="row justify-content-center">
                            <button class="btn btn-lg btn-primary w-25" type="submit">Pay Payment</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Transaction End -->

<?php require_once("../main-components/footer.php") ?>
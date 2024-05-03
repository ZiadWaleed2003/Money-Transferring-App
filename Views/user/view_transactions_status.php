<?php require("../../Models/Formation.php");?>
<?php
    session_start(); //EDITS AFTER SESSION
    // session_destroy();

    //EDITS AFTER SESSION
    if (!isset($_SESSION['user']['id'])) {
        $_SESSION['user']['id'] = 1;
    }

    $transaction_data = $_SESSION['transaction'];

    if($transaction_data['status'] === Formation::cleanTransactionStatus(0)){
        $status = 0;
        $css_text = 'danger';
    }
    else if($transaction_data['status'] === Formation::cleanTransactionStatus(1)){
        $css_text = 'success';
        $status = 1;
    }
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
                <?php

                    if($transaction_data['type'] == 'send'){
                        
                        echo '<a href="send-money.php" class="h5">Send Money</a>';
                    }
                    else if($transaction_data['type'] == 'donation'){

                        echo '<a href="send-donation.php" class="h5">Send Donation</a>';
                    }
                    else if($transaction_data['type'] == 'bill'){
                        
                        echo '<a href="pay-payment.php" class="h5">Pay Payment</a>';
                    }
                    else if($transaction_data['type'] == 'receive'){
                        
                        echo '<a href="requistlist.php" class="h5">Request List</a>';
                    }
                ?>
                &nbsp;
                /
                &nbsp;
                <span class="h5">IPN CHECK<span>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary text-<?php echo $css_text?>">Transaction Status</a>

            </span>
        </div>
        <div id="transaction-section-content" class="container-fluid">
            <div id="send-money-page" class="row justify-content-center">
                <div class="bg-secondary rounded h-100 p-4 col-10 text-center">

                    <div class="text-center pb-4">
                        <?php if($status):?>

                            <img width="200" src="../assets/img/done transaction status.png">
                        <?php else:?>
                                
                                <img width="200" src="../assets/img/cancelled transaction status.png">
                        <?php endif;?>
                    </div>
                    <div class="container">

                        <?php if(!$status):?>
                            <div class="d-flex align-items-baseline justify-content-center">
                                <div class="col-6 d-flex justify-content-end">
                                    <h3 class="text-light">ERROR MESSAGE:</h3>
                                </div>
                                <div class="col-6 d-flex justify-content-start ps-2">

                                    <?php echo "<h2 class='text-$css_text text-capitalize'>&nbsp; $transaction_data[error_message]</h2>" ?>
                                </div>
                            </div>
                        <?php endif;?>

                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">
                                <h3 class="text-light">Transaction ID:</h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <?php 
                                    if($status)
                                        echo "<h2 class='text-$css_text'>&nbsp; $transaction_data[id]</h2>";
                                    else{
                                        echo "<h2 class='text-$css_text'>&nbsp; ------------</h2>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">                                
                                <h3 class="text-light">Sender Name: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <?php 
                                    if($status && isset($transaction_data['sender_name']))
                                    {
                                        echo "<h2 class='text-$css_text text-capitalize'>&nbsp; $transaction_data[sender_name]</h2>";
                                    }
                                    else
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; ------------</h2>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Receiver Name: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <?php 
                                    if($status && isset($transaction_data['receiver_name']))
                                    {
                                        echo "<h2 class='text-$css_text' text-capitalize>&nbsp; $transaction_data[receiver_name]</h2>";
                                    }
                                    else
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; ------------</h2>";
                                    }
                                ?>
                            </div>

                        </div>
                        <div class="d-flex align-items-baseline justify-content-center">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Date: </h3>
                            </div>
                            <div class="col-6 d-flex justify-content-start ps-2">
                                <?php 
                                    if($status && isset($transaction_data['date']))
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; $transaction_data[date]</h2>";
                                    }
                                    else
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; ".date("d-m-Y H:i:s", time()+3600)."</h2>";
                                    }
                                ?>
                            </div>

                        </div>
                        <div class="d-flex align-items-baseline justify-content-center g-5">
                            <div class="col-6 d-flex justify-content-end">

                                <h3 class="text-light">Amount: </h3>
                            </div>
                            <div class="col-6 d-flex align-items-baseline justify-content-start ps-2">
                                <?php 
                                    if($status && isset($transaction_data['amount']))
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; $transaction_data[amount]</h2>";
                                        echo "<span class='h5 text-$css_text'> E£</span>";
                                    }
                                    else
                                    {
                                        echo "<h2 class='text-$css_text'>&nbsp; -----</h2>";
                                    }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="text-center pt-2">

                        <a href="transactions.php">
                            <button type="button" class="btn btn-primary btn-lg m-2 text-capitalize">back to home</button>
                        </a>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Blank End -->


    <?php require_once("../main-components/footer.php") ?>
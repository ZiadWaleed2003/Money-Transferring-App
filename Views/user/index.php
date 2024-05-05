<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php
if(isset($_SESSION['error_message'])){
    echo "<script>alert('".$_SESSION['error_message']."')</script>";
    unset($_SESSION['error_message']);
   }
?>
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">

        <div class="col-12 text-center header">
            <h3 class="display-3  pt-5">ELZowzat & Bassel</h3>
            <h4 class="text-primary">Just one click does a lot</h4>
        </div>
        <div class="fade">
            <br><br><br>
        </div>
        <div id="transaction-section-content" class="container-fluid pt-5">
            <div class="home-page">

                <div class="row g-4 mb-4 justify-content-center">
                    <div class="col-sm-6 col-xl-4">
                        <a id="check-balance" class="options" href="card.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Cards</h2>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-4">
                        <a id="send-to-card" class="options" href="transactions.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Transactions</h2>
                            </div>
                        </a>
                    </div>
                </div>    

                <div class="row g-4 mb-4  justify-content-center">
                    <div class="col-sm-6 col-xl-4">
                        <a id="send-donation" class="options" href="transaction-history.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Transactions Report</h2>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <a id="send-to-wallet" class="options" href="feedback.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Feedback</h2>
                            </div>
                        </a>
                    </div>  
                </div>
                
            </div>
        </div>
    </div>
</div>


<?php require_once("../main-components/footer.php") ?>
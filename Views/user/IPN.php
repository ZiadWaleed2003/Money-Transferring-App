<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>


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
                <a href="transactions.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="send-money.php" class="h5">Send Money</a>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary">Check IPN</a>

            </span>
        </div>

        <div id="transaction-section-content" class="container-fluid pt-5">
            <div id="send-money-page" class="row justify-content-center">
                <div class="bg-secondary rounded h-100 p-4 col-12 pb-5">
                    <div class="card-number text-center">
                        <span class="text-light h4">Card number:</span>
                        <span class="text-muted h4">&nbsp;1234 xxxx xxxx 5678</span>
                    </div>
                    <div class="line"></div>
                    <form>
                        <div id="ipn-inputs" class="input-group d-flex justify-content-center align-items-center pb-5">
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_1" class="ipn" id="IPN-1" maxlength="1" required>
                                
                            </div>
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_2" class="ipn" id="IPN-2" maxlength="1" required>

                            </div>
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_3" class="ipn" id="IPN-3" maxlength="1" required>
                                
                            </div>
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_4" class="ipn" id="IPN-4" maxlength="1" required>

                            </div>
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_5" class="ipn" id="IPN-5" maxlength="1" required>

                            </div>
                            <div class="col-1 text-center ipn-input">
                                <input type="text" name="IPN_6" class="ipn" id="IPN-6" maxlength="1" required>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center pt-5">
                            <button class="btn btn-lg btn-primary w-25 m-2" type="submit">Submit IPN</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Transaction End -->

<?php require_once("../main-components/footer.php") ?>
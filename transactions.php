<?php require_once("main-components/header.php") ?>
<?php require_once("main-components/side-navbar.php") ?>
<?php require_once("main-components/navbar.php") ?>


<!-- Transaction Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        
        <div class="container back-to-previous">
            <a href="" class="text-decoration-underline"><i class="bi bi-chevron-left me-1"></i>back</a>
        </div>

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Transactions</h3>
        </div>
        
        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="#" class="h5">test1</a>
                &nbsp;
                /
                &nbsp;
                <a href="#" class="h5">test2</a>
                &nbsp;
                /
                &nbsp;
                <a href="#" class="h5 text-primary">test3</a>

            </span>
        </div>

        <div id="transaction-section-content" class="container-fluid pt-5">
            <div>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Check Balance</h3>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h4 class="m-0 text-center p-2">Send Money to Card</h4>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h4 class="m-0 text-center p-2">Send Money to Wallet</h4>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Send Donation</h3>
                            </div>
                        </a>
                    </div>
                    
                </div>
                <div class="row g-4 mb-4">
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Request Money</h3>
                            </div>
                        </a>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Requests list</h3>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Pay Payments</h3>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <a href="#" class="options">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Transaction History</h3>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Transaction End -->

<?php require_once("main-components/footer.php") ?>
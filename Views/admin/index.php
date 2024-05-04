<?php require_once("../main-components/header.php")?>
<?php require_once("../main-components/admin-side-navbar.php")?>
<?php require_once("../main-components/navbar.php")?>



<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">

        <div class="col-12 text-center header">
            <h3 class="display-3  pt-5">ADMIN</h3>
            <h4 class="text-primary">ElZowZat & Bassel</h4>
        </div>
        <div class="fade">
            <br><br><br>
        </div>
        <div id="transaction-section-content" class="container-fluid pt-5">
            <div class="home-page">

                <div class="row g-4 mb-4 justify-content-center">
                    <div class="col-sm-6 col-xl-4">
                        <a id="check-balance" class="options" href="users.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Users</h2>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 col-xl-4">
                        <a id="send-to-card" class="options" href="bills.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Bills</h2>
                            </div>
                        </a>
                    </div>
                </div>    

                <div class="row g-4 mb-4  justify-content-center">
                    <div class="col-sm-6 col-xl-4">
                        <a id="send-donation" class="options" href="donations.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Donations</h2>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <a id="send-to-wallet" class="options" href="banks.php">
                            <div class="section-icon m-2 flex-column align-items-center justify-content-center p-4">
                                <h2 class="m-0 text-center p-2">Banks</h2>
                            </div>
                        </a>
                    </div>  
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- blank End -->


<?php require_once("../main-components/footer.php")?>

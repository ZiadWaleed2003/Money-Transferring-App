<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>





<!-- Blank Start -->

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
                <a href="checkbalance.php" class="h5 text-primary">Check Balance</a>

            </span>
        </div>
        
        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                
                <form action="" >
                    <div class="flex-column justify-content-center align-items-center text-center">

                        <div class="row p-3">
                            <h5 class="text-body">Please select a card and click the submit button to check its balance.</h5>
                        </div>

                        <div class="row col-4 pb-5 m-auto">
                                                        
                            <select id="card-select" class="form-select form-select-lg mb-3 text-center" name="card" required>
                                <option value="1">1234 - 1234 - 1234 - 1234</option>
                                <option value="2">1234 - 1234 - 1234 - 1234</option>
                                <option value="3">1234 - 1234 - 1234 - 1234</option>
                            </select>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary m-2 w-25">Show Balance</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Blank End -->

<?php require_once("../main-components/footer.php") ?>
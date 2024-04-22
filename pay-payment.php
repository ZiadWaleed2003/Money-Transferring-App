<?php require_once("main-components/header.php") ?>
<?php require_once("main-components/side-navbar.php") ?>
<?php require_once("main-components/navbar.php") ?>


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
                <a href="send-donation.php" class="h5 text-primary">Pay Payment</a>

            </span>
        </div>

        <div id="transaction-section-content" class="container-fluid pt-5">
            <div id="send-money-page" class="row justify-content-center">
                <div class="bg-secondary rounded h-100 p-4 col-10">

                    <form>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Select Your Card</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                                <option value="" class="text-muted" selected disabled>-- Open Cards list --</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <label for="" class="form-label h4">Select Payment</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                                    <option value="" class="text-muted" selected disabled>-- Open payments list --</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label h4">Amount</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="amount" name="amount" placeholder="12345" class="form-control form-control-lg" aria-label="Amount (to the nearest dollar)" required>
                                    <span class="input-group-text ">E£</span>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger alert-dismissible fade" role="alert">
                            <i class="fa fa-exclamation-circle me-2 show"></i>An icon &amp; dismissing danger alert—check it out!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

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

<?php require_once("main-components/footer.php") ?>
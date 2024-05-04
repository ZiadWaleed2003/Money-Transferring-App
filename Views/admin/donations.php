<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/admin-side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>


<!-- Transaction Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Donations</h3>
        </div>
        
        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="index.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="donations.php" class="h5 text-primary">Donations</a>

            </span>
        </div>

        <div id="admin-users-homepage" class="container-fluid pt-5">
            <div class="home-page">
                <div class="row g-4 mb-4 justify-content-center align-items-center">
                    <div class="col-sm-6 col-xl-3">
                        <a id="check-balance" class="options" href="show-donations.php">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Show Donations</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <a id="check-balance" class="options" href="add-donations.php">
                            <div class="bg-dark flex-column align-items-center justify-content-center p-4">
                                <h3 class="m-0 text-center p-2">Add Donations</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Transaction End -->

<?php require_once("../main-components/footer.php") ?>
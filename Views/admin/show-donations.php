<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/admin-side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>

<?php require_once("../../controllers/DonationController.php"); ?>
<?php require_once("../../Models/donation.php"); ?>
<?php $donationcontroller = new DonationController; ?>




<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        <div class="container back-to-previous" onclick="window.history.back()">
            <a class="text-decoration-underline"><i class="bi bi-chevron-left me-1"></i>back</a>
        </div>

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Users</h3>
        </div>

        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="index.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="donations.php" class="h5">Donations</a>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary">Show Donations</a>

            </span>
        </div>

        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">DONATIONS</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Account number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $donation = $donationcontroller->viewAlldonations();
                                    if ($donation) {
                                        foreach ($donation as $donations) {
                                            echo "<tr>";
                                            echo "<td>" . $donations['id'] . "</td>";
                                            echo "<td>" . $donations['name'] . "</td>";
                                            echo "<td>" . $donations['balance'] . "</td>";
                                            echo "<td>" . $donations['account_number'] . "</td>";
                                            echo "<tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php require_once("../main-components/footer.php") ?>
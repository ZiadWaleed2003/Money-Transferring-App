
<?php require_once("../main-components/header.php") ?>

<!-- // TODO : (Add Admin main-components) -->
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>




<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4 text-uppercase">ADD BANK</h6>
                <form action="../Models/add_bank.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-capitalize">Bank Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Bank Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="number" class="form-control" name="id" placeholder="ID">
                    </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">ADD BILL PAYMENT</h6>
                <form action="../Models/add_bill.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Bill Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Bill Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ACCOUNT NO.</label>
                        <input type="number" class="form-control" name="account_number" placeholder="NO.">
                    </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6 m-auto">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">ADD DONATION</h6>
                        <form action="../Models/add_donation.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" aria-label="NAME" aria-describedby="basic-addon1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ACCOUNT NO.</label>
                                <input type="number" class="form-control" name="account_number" placeholder="NO.">
                            </div>
                            <div class="mb-3 form-check">
                            </div>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
        <!-- Blank End -->

        <?php require_once("../main-components/footer.php") ?>
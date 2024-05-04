<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/admin-side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>

<?php require_once("../../controllers/BillController.php"); ?>
<?php require_once("../../Models/bill.php"); ?>
<?php $billcontroller = new BillController; ?>




<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        <div class="container back-to-previous" onclick="window.history.back()">
            <a class="text-decoration-underline"><i class="bi bi-chevron-left me-1"></i>back</a>
        </div>

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Bills</h3>
        </div>

        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="index.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="bills.php" class="h5">Bills</a>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary">Add Bills</a>

            </span>
        </div>

        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        
                        <?php
                            if (isset($_POST['addbill'])) {
                                if (isset($_POST['bill_name']) && isset($_POST['account_number'])) {
                                    if (!empty($_POST['bill_name']) && !empty($_POST['account_number'])) {
                                        $bill = new bill;
                                        $bill->setBillName($_POST['bill_name']);
                                        $bill->setAcct_No($_POST['account_number']);
                                        if ($billcontroller->addBill($bill))  {
                                            echo '<div class="alert alert-success alert-dismissible text-center text-capitalize" role="alert">
                                                    <i class="fa fa-exclamation-circle me-2"></i>
                                                    BILL ADDED
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                        } else {

                                            echo '<div class="alert alert-danger alert-dismissible text-center text-capitalize" role="alert">
                                                    <i class="fa fa-exclamation-circle me-2"></i>
                                                    BILL ALREADY EXISTS"
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                        }
                                    }
                                }
                            }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label h4 ms-2">Bill Name</label>
                                <input type="text" class="form-control" name="bill_name" placeholder="Bill Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4 ms-2">ACCOUNT NO.</label>
                                <input type="number" class="form-control" name="account_number" placeholder="NO.">
                            </div>
                            <div class="mb-3 form-check">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="addbill" class="btn btn-primary ps-5 pe-5">
                                    <span class="h1">
                                        ADD
                                    </span>
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php require_once("../main-components/footer.php") ?>

<?php require_once("../main-components/header.php") ?>

<!-- // TODO : (Add Admin main-components) -->
<?php require_once("../main-components/admin-side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php  
    require_once ("../../controllers/BankController.php");
    require_once ("../../controllers/BillController.php");
    require_once ("../../controllers/DonationController.php");
    require_once ("../../Models/bank.php");
    require_once ("../../Models/bill.php");
    require_once ("../../Models/donation.php");

    
    $bankcontroller = new BankController;
    $billcontroller = new BillController;
    $donationcontroller = new DonationController;


?>




<!-- Blank Start -->
<div class="">
    <a id="Admin" class="options" href="index.php">
        <button type="button" class="btn btn-primary btn-block ms-4 mt-4" style="width: 97%;">VIEW</button>
    </a>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4 text-uppercase">ADD BANK</h6>
                <form action="Admin.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-capitalize">Bank Name</label>
                        <input type="text" class="form-control" name="bankname" placeholder="Bank Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="number" class="form-control" name="id" placeholder="ID">
                    </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" name="addbank"class="btn btn-primary">ADD</button>
                </form>
                <?php
                if(isset($_POST['addbank'])){
                    if(isset($_POST['bankname']) && isset($_POST['id'])){
                        if(!empty($_POST['bankname']) && !empty($_POST['id'])){
                            $bank = new bank;
                            $bank->setName($_POST['bankname']);
                            $bank->setId($_POST['id']);
                            if($bankcontroller->addBank($bank)){
                                echo "BANK ADDED";
                            }
                            else{
                                echo "BANK ALREADY EXISTS";
                            }

                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">ADD BILL PAYMENT</h6>
                <form action="Admin.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Bill Name</label>
                        <input type="text" class="form-control" name="bill_name" placeholder="Bill Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ACCOUNT NO.</label>
                        <input type="number" class="form-control" name="account_number" placeholder="NO.">
                    </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" name="addbill" class="btn btn-primary">ADD</button>
                </form>
                <?php
                if(isset($_POST['addbill'])){
                    if(isset($_POST['bill_name']) && isset($_POST['account_number'])){
                        if(!empty($_POST['bill_name']) && !empty($_POST['account_number'])){
                            $bill = new bill;
                            $bill->setBillName($_POST['bill_name']);
                            $bill->setAcct_No($_POST['account_number']);
                            if($billcontroller->addBill($bill)){
                                echo "BILL ADDED";
                            }
                            else{
                                echo "BILL ALREADY EXISTS";
                            }

                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6 m-auto">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">ADD DONATION</h6>
                        <form action="Admin.php" method="POST">
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
                            <button type="submit" name="adddonation" class="btn btn-primary">ADD</button>
                        </form>
                        <?php
                if(isset($_POST['adddonation'])){
                    if(isset($_POST['name']) && isset($_POST['account_number'])){
                        if(!empty($_POST['name']) && !empty($_POST['account_number'])){
                            $donation = new donation;
                            $donation->setName($_POST['name']);
                            $donation->setAcct_No($_POST['account_number']);
                            if($donationcontroller->adddonation($donation)){
                                echo "DONATION ADDED";
                            }
                            else{
                                echo "DONATION ALREADY EXISTS";
                            }

                        }
                    }
                }
                ?>
                    </div>
                </div>
        <!-- Blank End -->

        <?php require_once("../main-components/footer.php") ?>
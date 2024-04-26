<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php
    require_once '../../controllers/CardController.php';
    require_once ("../../Models/card.php");

    $CardController= new CardController;
    $bank=$CardController->getbanks();

                         
    if (isset($_POST['add'])){
        if (isset($_POST['name']) && isset($_POST['bankname']) && isset($_POST['cardnumber']) && isset($_POST['cvv']) && isset($_POST["ipn"])) {
            
            if (!empty($_POST['name']) && !empty($_POST['cardnumber']) && !empty($_POST['cvv']) && !empty($_POST['ipn'])) {
                $card = new card;
                $card->setName($_POST['name']);
                $card->setNumber($_POST['cardnumber']);
                $card->setCvv($_POST['cvv']);
                $card->setIpnCode($_POST['ipn']) ;
                $card->setBankId((int)$_POST['bankname']);
                
 
   
                if($CardController->addCard($card)){
                    header("location:card.php");
                    

                }
                else{
                    echo"Error: Card not added";
                }
        }
    }
}

?>

            <!-- add card Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h4 class="mb-4">Add New Card</h4>
                            <form method="post" action="add_card.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Card Name Holder</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingSelect">Bank Name</label>
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="bankname" >
                                        <?php
                                        foreach($bank as $banks)
                                        {
                                            ?>
                                            <option value="<?php echo $banks["id"] ?>"><?php echo $banks["name"] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Card Number</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="cardnumber" placeholder="1234 5678 9102 3456">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CVV Number</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="cvv" placeholder="eg. 177">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">IPN Code Number</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="ipn">
                                </div>
                                <button type="submit" name="add"class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Banks</h6>
                            <div class="owl-carousel testimonial-carousel">
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded-circle mx-auto mb-4" src="../assets/img/commercial-international-bank-cib-vector-logo-small.png" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">CIB</h5>
                                    <p>Commercial International Bank Egypt</p>
                                </div>
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded-circle mx-auto mb-4" src="../assets/img/qnb.ai-converted.png" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">QNB</h5>
                                    <p>Qatar National Bank</p>
                                </div>
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded-circle mx-auto mb-4" src="../assets/img/Banque_misr.jpg" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">Banque Misr</h5>
                                    <p>Banque Misr National Bank</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- add card end -->
 <?php require_once("../main-components/footer.php") ?>
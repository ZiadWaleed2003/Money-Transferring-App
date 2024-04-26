<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>


<?php
    require_once '../../controllers/CardController.php';
    $CardController=new CardController;
    $myValue = isset($_GET['myValue']) ? $_GET['myValue'] : null;
    
if (isset($_POST["edit"])) {
        $name=$_POST['name'];
        $value = $_POST['value'];

      if ($CardController->updateCard($name,$value)) {
        echo "<script> window.location.href='card.php';</script>";
      }
      else{
        echo "error in DB";
      }
    }

?>


<!-- Blank Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">    
        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">UPDATE INFO</h3>
        </div>
        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                <form action="editcard.php" method="post" >
                    <div class="flex-column justify-content-center align-items-center text-center">
                        <div class="row p-3">
                            <h3 class="text-body">New Card Name</h3>
                        </div>
                        <div class="row col-4 pb-5 m-auto">  
                            <input type="hidden" name="value" value="<?php echo htmlspecialchars($myValue); ?>">                           
                            <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="name">
                        </div>
                        <div>
                            <button type="submit" name="edit" class="btn btn-lg btn-primary m-2 w-25">Change</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Blank End -->

<?php require_once("../main-components/footer.php") ?>
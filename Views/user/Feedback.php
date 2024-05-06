<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php
require_once '../../controllers/useracct_Controller.php';

$useracct_Controller = new useracct_Controller;


if (isset($_POST['submit'])) {
    if(!empty($_POST['feedback'])){
        $feedback = trim($_POST['feedback']);
        $result = $useracct_Controller->feedback($feedback);
            if ($result) {
                echo "<script> window.location.href='index.php';</script>";
            }
            else{
                echo "<script>alert('".$_SESSION['error_message']."')</script>";
                unset($_SESSION['error_message']);
            }    
        }
        else{
            echo "<script>alert('Feedback is Empty')</script>";
    }
    }


?>

<!-- Feedback Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Feedback</h3>
        </div>

        <!-- <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="transactions.php" class="h5 text-primary">Home Page</a>

            </span>
        </div> -->

        <div id="transaction-section-content" class="container-fluid pt-5">
            <div class="home-page">
                <div class="row g-4 justify-content-center">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4 text-center">

                            <!-- <h2 class="mb-4">Feedback</h2> -->
                            <form action="feedback.php" method="post">
                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Leave a feedback here" name="feedback" id="floatingTextarea" style="height: 150px" ></textarea>
                                    <label for="floatingTextarea">Feedback</label>
                                </div>

                                <div class="mb-3"></div>

                                <input type="submit" name="submit" class="btn btn-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">

</div>

<!-- Feedback end -->

<?php require_once("../main-components/footer.php") ?>
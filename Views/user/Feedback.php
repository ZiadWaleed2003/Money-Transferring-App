<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php
    require_once '../../controllers/useracct_Controller.php';

    $useracct_Controller= new useracct_Controller;
    

    if(isset($_POST['submit']))
    {
    $feedback= $_POST['feedback'];
    $result=$useracct_Controller->feedback($feedback);
    if($result){
        echo "<script> window.location.href='index.php';</script>";
    }
    else{
        echo "not added";
    }
    }

?>

     <!-- Feedback Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" >
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4">Feedback</h2>
                            <form action="feedback.php" method="post">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a feedback here"
                                       name="feedback" id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Feedback</label>
                                </div>
                                <div class="mb-3">
                                </div>
                                    <input type="submit" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Feedback end -->

        <?php require_once("../main-components/footer.php") ?>
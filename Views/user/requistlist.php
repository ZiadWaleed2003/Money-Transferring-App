<?php 
    session_start(); //EDITS AFTER SESSION

    //EDITS AFTER SESSION
$_SESSION['user']['id'] = 4;
?>
<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<?php require("../../controllers/CRUD.php");?>
<?php require("../../Models/Formation.php");?>





<!-- Blank Start -->
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
                <a href="requistlist.php" class="h5 text-primary">Requests List</a>

            </span>
        </div>

        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                <div class="">
                    <div class="bg-secondary rounded h-100 p-4">
                        
                        <div class="table-responsive bg-dark p-5">

                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">description of requist</th>
                                        <th scope="col">Req. Card</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user_id = $_SESSION['user']['id'];
                                        // var_dump($user_id);
                                        $sql = "SELECT rs.id, rs.sender_id, rs.reciever_id, rs.amount, rs.description, rs.date, u_2.name, uc.number
                                                FROM requests AS rs
                                                INNER JOIN usercards AS uc ON rs.sender_id = uc.id AND uc.user_id = $user_id
                                                INNER JOIN usercards AS uc_alias ON rs.reciever_id = uc_alias.id
                                                INNER JOIN users AS u_1 ON u_1.id = uc.user_id
                                                INNER JOIN users AS u_2 ON u_2.id = uc_alias.user_id";

                                        $requests = CRUD::Select($sql);

                                        $i = 0;
                                        foreach ($requests as $request){
                                            $i++;
                                            echo   "<tr>
                                                        <th scope='row'>$i</th>
                                                        <td class='text-capitalize'>$request[name]</td>
                                                        <td>$request[amount]</td>
                                                        <td>$request[description]</td>
                                                        <td>".Formation::showCardNumber($request['number'])."</td>
                                                        <td>
                                                            <button class='btn btn-success m action-button' data-action='accept' data-id='$request[id]'>Accept</button>
                                                        </td>
                                                        <td>
                                                            <button class='btn btn-danger m2 action-button' data-action='refuse' data-id='$request[id]'>Refuse</button>
                                                        </td>
                
                                                    </tr>";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <form id="go" method="POST" action="../../controllers/TransactionsController.php">
                                <input type="hidden" name="transaction_type" value="receive">
                            </form>
                        </div>
                    </div>
                    <?php
                            // session_start(); //EDITS AFTER SESSION

                            if(isset($_SESSION['transaction']['error_message'])):
                        ?>
                        <div class="alert alert-danger alert-dismissible text-center" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i>
                            <?php
                                echo $_SESSION['transaction']['error_message'];
                                unset($_SESSION['transaction']['error_message']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php require_once("../main-components/footer.php") ?>
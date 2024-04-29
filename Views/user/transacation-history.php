<?php require_once ("../main-components/header.php") ?>
<?php require_once ("../main-components/side-navbar.php") ?>
<?php require_once ("../main-components/navbar.php") ?>
<?php require_once ("../main-components/basic-table.php") ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';
$active_user_id = 706; #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>



<!-- blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row rounded justify-content-center mx-0">
        <button type="button" class="btn btn-primary my-2 w-100">Export</button>
        <div class="card col rounded mx-2 bg-secondary">
            <div class="card-body">
                <h3 class="card-title">Personal Transaction History</h3>
                <?php
                $res = $user->getTranscationHistory();
                if ($res) {
                    generateTable(["ID", "Sender", "Receiver", "Date", "Status", "Desc.", "Amount"], $res);
                }
                ?>
            </div>
        </div>
        <div class="card mx-2 col bg-transparent h-100">
            <div class="row h-100 mb-2 bg-secondary rounded">
                <div class="card col bg-secondary rounded h-50">
                    <div class="card-body">
                        <h3 class="card-title">Recent Bills</h3>
                        <?php
                        $res = $user->getBillHistory();
                        if ($res) {
                            generateTable(["ID", "Sender", "Amount", "Acct.#"], $res);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row h-100 my-2 bg-secondary rounded">
                <div class="card col bg-secondary rounded h-50">
                    <div class="card-body">
                        <h3 class="card-title">Recent Donations</h3>
                        <?php
                        $res = $user->getDonationHistory();
                        if ($res) {
                            generateTable(["ID", "Sender", "Amount", "Acct.#"], $res);
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- blank End -->

<?php require_once ("../main-components/footer.php") ?>


<?php require_once("../main-components/header.php")?>
<?php require_once("../main-components/side-navbar.php")?>
<?php require_once("../main-components/navbar.php")?>
<?php require_once("../main-components/basic-table.php")?>



<!-- blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row rounded justify-content-center mx-0">
    <button type="button" class="btn btn-primary my-2 w-100">Export</button>
        <div class="card col rounded mx-2 bg-secondary">
            <div class="card-body">
                <h3 class="card-title">Personal Transaction History</h3>
                <?php
    $sql = "SELECT * FROM moneyapp.transactions WHERE sender_id = 205 OR receiver_id = 205;";
    $res = $conn->query($sql);
    if ($res) {
        generateTable($res);
    }
?>
            </div>
        </div>
        <div class="card mx-2 col bg-transparent h-100">
            <div class="row h-100 mb-2 bg-secondary rounded">
                <div class="card col bg-secondary rounded h-50">
                    <div class="card-body">
                        <h3 class="card-title">Recent Bills</h3>
                    </div>
                </div>
            </div>
            <div class="row h-100 my-2 bg-secondary rounded">
                <div class="card col bg-secondary rounded h-50">
                    <div class="card-body"><h3 class="card-title">Recent Donations</h3></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blank End -->

<?php require_once("../main-components/footer.php")?>

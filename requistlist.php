<?php require_once("main-components/header.php") ?>
<?php require_once("main-components/side-navbar.php") ?>
<?php require_once("main-components/navbar.php") ?>





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
                                        <th scope="col"> Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">description of requist</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>zeyad hussam </td>
                                        <td>300</td>
                                        <td>i want this money </td>
                                        <td>
                                            <button class="btn btn-success m2">accept</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger m2">refuse</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>mohamed</td>
                                        <td>30000</td>
                                        <td>xxxxxxxxxxxxxxxxxxx</td>
                                        <td>
                                            <button class="btn btn-success m2">accept</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger m2">refuse</button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>adel</td>
                                        <td>6000</td>
                                        <td>zzzzzzzzzzzzzzzzz</td>
                                        <td>
                                            <button class="btn btn-success m2">accept</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger m2">refuse</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php require_once("main-components/footer.php") ?>
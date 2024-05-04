<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/admin-side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>

<?php require_once("../../controllers/useracct_Controller.php"); ?>
<?php require_once("../../Models/User.php"); ?>
<?php $usercontroller = new useracct_Controller; ?>




<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        <div class="container back-to-previous" onclick="window.history.back()">
            <a class="text-decoration-underline"><i class="bi bi-chevron-left me-1"></i>back</a>
        </div>

        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">Users</h3>
        </div>

        <div class="col-12 text-center pb-5">
            <span id="links-tracking">
                <a href="index.php" class="h5">Home Page</a>
                &nbsp;
                /
                &nbsp;
                <a href="users.php" class="h5">Users</a>
                &nbsp;
                /
                &nbsp;
                <a class="h5 text-primary">Show Users</a>

            </span>
        </div>

        <div class="container-fluid pt-5">
            <div class="row justify-content-center h-100 p-5">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">USERS</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user = $usercontroller->viewAllusers();
                                    if ($user) {
                                        foreach ($user as $users) {
                                            echo "<tr>";
                                            echo "<td>" . $users['id'] . "</td>";
                                            echo "<td>" . $users['name'] . "</td>";
                                            echo "<td>" . $users['email'] . "</td>";
                                            echo "<td>" . $users['phone_number'] . "</td>";
                                            echo "<td>" . $users['role'] . "</td>";
                                            echo "<tr>";
                                        }
                                    }
                                    ?>
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

<?php require_once("../main-components/footer.php") ?>
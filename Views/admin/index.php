<?php require_once("../main-components/header.php")?>
<?php require_once("../main-components/side-navbar.php")?>
<?php require_once("../main-components/navbar.php")?>


<!-- blank Start -->
<div class="col-sm-6 col-xl-3">
    <a id="Admin" class="options" href="Admin.php">
        <button type="button" class="btn btn-outline-light m-2">DASHBOARD</button>
    </a>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- First Table -->
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
                                    $host = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "moneyapp";
                                    $conn = mysqli_connect($host, $username, $password, $dbname);

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT id, name, email, phone_number, role FROM users";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row["id"] . "</th>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["phone_number"] . "</td>";
                                            echo "<td>" . $row["role"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No users found</td></tr>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Second Table -->
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">BILLS</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Account number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // PHP code to fetch and display data for the second table
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Third Table -->
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">DONATIONS</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Account number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // PHP code to fetch and display data for the third table
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Fourth Table -->
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Banks</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // PHP code to fetch and display data for the fourth table
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blank End -->


<?php require_once("../main-components/footer.php")?>

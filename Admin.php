<?php require_once("main-components/header.php")?>
<?php require_once("main-components/side-navbar.php")?>
<?php require_once("main-components/navbar.php")?>




<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">ADD BANk</h6>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Bank Name</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ID</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                        </div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
               <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary rounded h-100 p-4">
                                    <h6 class="mb-4">ADD BILL PAYMENT</h6>
                                    <form>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bill Info</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Account NO.</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">ADD</button>
                                    </form>
                                </div>
                            </div>
                            <div class="container-fluid pt-4 px-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-xl-6">
                                        <div class="bg-secondary rounded h-100 p-4">
                                            <h6 class="mb-4">ADD DONATION</h6>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Account NO.</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3 form-check">
                                                </div>
                                                <button type="submit" class="btn btn-primary">ADD</button>
                                            </form>
                                        </div>
                                    </div>
                        



            <!--table start-->
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
                                </tr>
                            </thead>
                            <tbody>
<?php                            
                    $host = "localhost";    
                    $username = "root";
                    $password = "";
                    $dbname = "moneyapp";
                    $conn = mysqli_connect($host, $username, $password, $dbname);

                    if (!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT id, name, email, phone_number FROM users";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row["id"] . "</th>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
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
        </div>
    </div>
<!-- Blank End -->

<?php require_once("main-components/footer.php")?>
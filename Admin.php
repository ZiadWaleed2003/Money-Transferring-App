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
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Zyad</td>
                                    <td>Atef</td>
                                    <td>ZyadAtef@email.com</td>
                                    <td>01142301658</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Ziad</td>
                                    <td>Adel</td>
                                    <td>elzoz@email.com</td>
                                    <td>01142301438</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ziad</td>
                                    <td>Waleed</td>
                                    <td>weld@email.com</td>
                                    <td>01548801438</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Bassel</td>
                                    <td>Waled</td>
                                    <td>basel@email.com</td>
                                    <td>010499901438</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Blank End -->

<?php require_once("main-components/footer.php")?>
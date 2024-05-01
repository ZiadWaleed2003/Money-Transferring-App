<?php require_once ("../main-components/header.php") ?>
<?php require_once ("../main-components/side-navbar.php") ?>
<?php require_once ("../main-components/navbar.php") ?>


<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <?php
    if (isset($_POST["FRMERROC"])) {
        echo ' <div class="mb-3"><p>Invalid form input. Please enter valid data and try again.</p></div>';
    }
    ?>
    <form action="/controllers/AcctEditController.php" method="POST" enctype="multipart/form-data" id="edit-form">
        <div class="row vh-100 bg-secondary rounded py-5 justify-content-center mx-0">
            <div class="col-4 h-100 mx-1 text-center">
                <img src="" alt="No picture uploaded" id="img-preview" class="acct-page-img w-100 mb-1 rounded-circle ">
                <label for="input-img" class="form-label"> Upload picture to display preview</label>
                <input name="profile_img" class="form-control bg-dark" type="file" id="input-img">
            </div>
            <div class="col h-100 mx-1">
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input name="profile_email" type="email" class="form-control" id="emailaddress"
                        aria-describedby="emailHelp"">
                    <div id=" emailHelp" class="form-text">We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordfirst" class="form-label">Password</label>
                <input name="profile_pass" type="password" class="form-control" id="passwordfirst">
            </div>
            <div class="mb-3">
                <label for="passwordrepeat" class="form-label">Repeat Password</label>
                <input name="profile_repeat" type="password" class="form-control" id="passwordrepeat">
            </div>
            <div class="mb-3">
                <label for="OTP" class="form-label">OTP</label>
                <input name="form-otp" type="password" class="form-control" id="OTP" required> <button id="otp-send"
                    class="btn my-2 btn-primary">Send OTP</button>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>
<!-- blank End -->


<?php require_once ("../main-components/footer.php") ?>

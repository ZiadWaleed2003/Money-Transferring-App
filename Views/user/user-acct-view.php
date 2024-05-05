<?php
require_once ("../main-components/header.php") ?>
<?php require_once ("../main-components/side-navbar.php") ?>
<?php require_once ("../main-components/navbar.php") ?>
<?php require_once ("../../models/User.php") ?>

<?php
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>

<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="card flex-wrap bg-secondary col-3 mx-3 px-0">
                <img src="<?php echo $user->getImagePath() ?>" class="card-img-top acct-page-img w-100 mb-1">
                <div class="card-body px-3 py-1">
                    <h5 class="card-title">Personal Info</h5>
                    <p class="card-text">
                    <h6 class="text-muted">Name:</h6>
                    <p><?php
                    echo $user->getName();
                    ?></p>
                    <h6 class="text-muted">Country:</h6>
                    <p>Egypt</p>
                    </p>
                </div>
            </div>
            <div class="card flex-wrap bg-secondary mx-3 col-4 py-4 px-2">
                <div id="view-body" class="card-body text-xl-start px-3 py-2">
                    <h3 class="card-title mb-xl-5">Account Info</h3>
                    <h5 class="text-muted">Email Address:</h5>
                    <p><?php
                    echo $user->getEmail();
                    ?></p>
                    <h5 class="text-muted">Phone Number:</h5>
                    <p><?php
                    echo $user->getPhoneNumber()
                        ?></p>
                    <h5 class="text-muted">Account Password:</h5>
                    <p>*****</p>
                    <h5 class="text-muted">Recovery Email:</h5>
                    <p><?php
                    echo $user->getEmail();
                    ?></p>
                    <button type="button" id="edit" class="btn btn-primary">Edit</button>
                    <button type="button" id="delete" class="btn btn-primary">Delete</button>
                </div>
            </div>
            <div class="card flex-wrap bg-secondary mx-3 col py-4 px-2">
                <div class="card-body text-xl-start px-3 py-2">
                    <h3 class="card-title mb-4">Stay Safe and use a password manger!</h3>
                    <div class="border rounded p-4 pb-0 mb-4">
                        <figure>
                            <blockquote class="blockquote mb-4">
                                <p>We're often told that the passwords for our online accounts should be really
                                    strong... The trouble is, most of us have lots of online accounts, so
                                    creating different passwords for all of them is hard. This is where a
                                    password manager can help. A password manager can store all
                                    your passwords securely, so you don’t have to worry
                                    about remembering them. This allows you to use unique, strong passwords for
                                    all your important accounts... </p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                The UK's National Cyber Security Centre
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blank End -->

<?php require_once ("../main-components/footer.php") ?>


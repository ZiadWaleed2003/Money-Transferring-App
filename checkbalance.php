<?php require_once("main-components/header.php")?>
<?php require_once("main-components/side-navbar.php")?>
<?php require_once("main-components/navbar.php")?>





<!-- Blank Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        
        
    <h1>Check Balance</h1>
    <p>Please select a card and click the submit button to check its balance.</p>
    <label for="card-select">Select a Card:</label>
<select id="card-select" name="card">
    <option value="credit">card 1</option>
    <option value="debit">card 2</option>
    <option value="gift">card 3</option>
</select>
<a href="http://localhost/Money-Transferring-App/balanceshow.php">
        <button type="button" class="btn btn-primary rounded-pill m-2" >show balance</button>
</a>
    </div>
</div>


<!-- Blank End -->

<?php require_once("main-components/footer.php")?>
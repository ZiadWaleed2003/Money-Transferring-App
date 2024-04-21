<?php require_once("main-components/header.php")?>
<?php require_once("main-components/side-navbar.php")?>
<?php require_once("main-components/navbar.php")?>





<!-- Blank Start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Balance</title>
</head>
<body>
    <h1>Check Balance</h1>
    <p>Please select a card and click the submit button to check its balance.</p>
    <label for="card-select">Select a Card:</label>
<select id="card-select" name="card">
    <option value="credit">card 1</option>
    <option value="debit">card 2</option>
    <option value="gift">card 3</option>
</select>
<input type="submit" value="Submit" />

</body>
</html>
<!-- Blank End -->

<?php require_once("main-components/footer.php")?>
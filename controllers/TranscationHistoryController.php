<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/main-components/basic-table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/User.php";

$active_user_id = 706; #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
$transes = $user->getTranscationHistory();
if ($transes) {
    $trhtml = generateBasicTable(["ID", "Sender", "Receiver", "Date", "Status", "Desc.", "Amount"], $transes);
}
$bills = $user->getBillHistory();
if ($bills) {
    $bihtml = generateBasicTable(["ID", "Sender", "Desc.", "Amount", "Acct.#"], $bills);
}
$donation = $user->getDonationHistory();
if ($donation) {
    $dohtml = generateBasicTable(["ID", "Sender", "Desc.", "Amount", "Acct.#"], $donation);
}

use Mpdf\Mpdf;

$mpdf = new Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction Statement</title>
    <style>
        html {
            border: 10px solid black;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;

        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto 20px;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .separator {
            border-top: 2px solid black;
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>

<body>

    <h1 class="title">Transaction Statement</h1>
    <h2 class="subtitle">' . $user->getName() . '</h2>
    <div class="separator"></div>
    
    <h2>Transactions</h2>
    '
    . $trhtml .
    '

    <div class="separator"></div>
    <h2>Bills</h2>

    ' . $bihtml . '

    <div class="separator"></div>
    <h2>Donations</h2>

    ' . $dohtml . '

</body>

</html>
';
$mpdf->writeHTML($html);
$mpdf->output();




?>


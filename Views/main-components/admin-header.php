<?php

    require("../../controllers/SessionController.php");
    
    SessionController::checkAdminLogin();

    SessionController::checkTransaction($keep_transactions_session ?? null);
    SessionController::checkTransactionRequest($keep_transactions_request_session ?? null);

    if(isset($check_take_ipn) && $check_take_ipn){
        SessionController::checkTakeIpn();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ElZowZat & Bassel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/Iconstylefav.css" rel="stylesheet">

    <?php if (file_exists("../assets/css/" . pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . ".css")): ?>
        <link rel="stylesheet" type="text/css"
            href="../assets/css/<?php echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); ?>.css">
    <?php endif; ?>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->


        <!-- Spinner End -->

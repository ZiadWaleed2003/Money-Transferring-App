<?php require_once("main-components/header.php")?>
<?php require_once("main-components/side-navbar.php")?>
<?php require_once("main-components/navbar.php")?>





<!-- Blank Start -->

    <style>
        .status-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .status-box {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: 20px;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        .status-icon {
            font-size: 48px;
            margin-right: 10px;
        }

        .status-text {
            font-size: 24px;
        }

        .pending {
            color: orange;
        }

        .completed {
            color: green;
        }

        .canceled {
            color: red;
        }
    </style>

<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        
    <div class="status-container">
        <h1>Transaction Status</h1>
       
        <img width="200" src="https://static.vecteezy.com/system/resources/previews/010/156/807/original/tick-check-mark-icon-sign-symbol-design-free-png.png">
        <br>
        <img  width="200" src="https://images.pngnice.com/download/2113/Wrong-Sign-PNG-Transparent-Image.png">
        <h2> sender name :  </h2>
        <h2> reciver name :  </h2>
        <h2> time :  </h2>
        <h2> Amount :  </h2>
        <a href="http://localhost/Money-Transferring-App/transactions.php">
        <button type="button" class="btn btn-primary rounded-pill m-2" >back to home</button>
    </a>
    </div>
</div>

<!-- Blank End -->


<?php require_once("main-components/footer.php")?>
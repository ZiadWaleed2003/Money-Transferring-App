<?php require_once("main-components/header.php")?>
<?php require_once("main-components/side-navbar.php")?>
<?php require_once("main-components/navbar.php")?>





<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
    <div class="">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">requist list</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">description of requist</th>
                    
                </tr>

                <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Balance</title>
    
</head>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>zeyad hussam </td>
                    <td>300</td>
                    <td>i want this money </td>
                    <td><botton class="refuse">refuse</botton>
                    </td>
                    <td><botton class="accept">accept</botton>
                    </td>
                    <style>
        /* CSS rules to change button colors */
            .refuse{
                border 1 px solid #700;
                padding :10px;
                color:fff;
                background: #700;
                border-radius: 2px;
                transition: all 0.5;
                font-size:10px;
            }
            .accept{
                border 1 px solid #700;
                padding :10px;
                color:fff;
                background: #008000;
                border-radius: 2px;
                transition: all 0.5;
                font-size:10px;
            }

    </style></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>mohamed</td>
                    <td>30000</td>
                    <td>xxxxxxxxxxxxxxxxxxx</td>
                    <td><botton class="refuse">refuse</botton>
                    </td>
                    <td><botton class="accept">accept</botton>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>adel</td>
                    <td>6000</td>
                    <td>zzzzzzzzzzzzzzzzz</td>
                    <td><botton class="refuse">refuse</botton>
                    </td>
                    <td><botton class="accept">accept</botton>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>
<!-- Blank End -->

<?php require_once("main-components/footer.php")?>
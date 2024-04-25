<?php require_once("../main-components/header.php")?>
<?php require_once("../main-components/side-navbar.php")?>
<?php require_once("../main-components/navbar.php")?>
<?php require_once("../main-components/basic-table.php")?>
<?php
$test = array("test", "test", "test", "test");
$teste = array("test1", "test2", "test3", "test4");



?>




<!-- blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <?php generateTable($test, $teste) ?>
    </div>
</div>
<!-- blank End -->

<?php require_once("../main-components/footer.php")?>

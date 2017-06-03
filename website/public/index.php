<?php
session_start();
require(realpath(__DIR__) . '/templates/header.php');
$final = new FinalTabel($db);
?>


    <div class="main-content">

        <?php
        include 'templates/dropdowntable.php';
        include 'templates/poules.php';
        include 'templates/tijdschema.php';
        ?>




    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>

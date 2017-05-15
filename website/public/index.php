<?php require(realpath(__DIR__) . '/templates/header.php');
require '../php/init.php';
?>


    <div class="main-content">

        <?php
        include 'templates/poules.php';
        include 'templates/tijdschema.php'
        ?>




    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>

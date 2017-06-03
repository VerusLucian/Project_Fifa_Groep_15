<?php
session_start();
require(realpath(__DIR__) . '/templates/header.php');

?>


        <?php
        include 'templates/dropdowntable.php';
        include 'templates/poules.php';
        include 'templates/tijdschema.php';
        ?>






<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>

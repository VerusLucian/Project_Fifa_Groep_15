<?php
session_start();
require(realpath(__DIR__) . '/templates/header.php');
require '../php/init.php';
$final = new FinalTabel($db);
?>


    <div class="main-content">

        <a style="text-decoration: none" href=""><div class="box" style="width: 100px; height: 100px; border: solid 1px; border-radius: 10px;"><h1 style="font-size: 60px; text-align: center">+</h1></div></a>


    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
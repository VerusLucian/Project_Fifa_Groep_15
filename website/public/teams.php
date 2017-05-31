<?php
session_start();
require("templates/perm.php");
require(realpath(__DIR__) . '/templates/header.php');
require '../php/init.php';
$final = new FinalTabel($db);
?>


    <div class="main-content">

<<<<<<< Updated upstream
        <a style="text-decoration: none" href=""><div class="box" style="width: 100px; height: 100px; border: solid 1px; border-radius: 10px;"><h1 style="font-size: 60px; text-align: center">+</h1></div></a>
=======
        <?php
            include 'templates/teams-toevoegen.php';
            include 'templates/players-toevoegen.php';
        ?>
>>>>>>> Stashed changes


    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
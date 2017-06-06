<?php
session_start();
require("templates/perm.php");
require(realpath(__DIR__) . '/templates/header.php');
$final = new FinalTabel($db);
?>


    <div class="main-content">
        <?php
            include 'templates/teams-toevoegen.php';
        ?>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
<?php
session_start();
require("templates/perm.php");
require(realpath(__DIR__) . '/templates/header.php');
$final = new FinalTabel($db);

$id = $_SESSION['id'];

$sql = "SELECT created_by FROM tbl_teams WHERE created_by='$id'";
$amount = $db->query($sql)->rowCount();

require("../php/team-infowriter.php");
?>


    <div class="main-content">
        <?php
            include 'templates/teams-toevoegen.php';

            if ($amount > 0) {
                include 'templates/team-info.php';
            }
            else
            {
                include 'templates/teams-toevoegen.php';
            }
            include 'templates/players-toevoegen.php';
        ?>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
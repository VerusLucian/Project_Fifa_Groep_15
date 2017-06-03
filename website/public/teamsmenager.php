<?php
session_start();
require_once '../php/init.php';


?>




<?php require(realpath(__DIR__) . '/templates/header.php'); ?>

<?php
include_once 'templates/team_title.php';
include_once 'templates/players-toevoegen.php';
include_once 'templates/team_players.php';
include_once 'templates/team_history.php';
?>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>


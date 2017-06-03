<?php
session_start();
require_once '../php/init.php';
$Player = new PlayerCollection($db);
?>




<?php require(realpath(__DIR__) . '/templates/header.php'); ?>

<?php
include_once 'templates/team_title.php';
if ($Player->NummberOfPlayers($_SESSION['team']) <= 4)
{
    include_once 'templates/players-toevoegen.php';
}

include_once 'templates/team_players.php';
include_once 'templates/team_history.php';
?>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>


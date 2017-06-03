<?php
session_start();

if ($_SESSION['team']['id'] == $_GET['team_id'])
{
    header('location:teamsmenager.php');
}


require_once '../php/init.php';

require(realpath(__DIR__) . '/templates/header.php');
include_once 'templates/team_title.php';
include_once 'templates/team_players.php';
include_once 'templates/team_history.php';
?>


<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>


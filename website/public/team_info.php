<?php

require_once '../php/init.php';
if (isset($_GET['team_id']))
{
    $players = new PlayerCollection($db);
    $team = new TeamCollection($db);
    $team_id = $_GET['team_id'];


}
else {
//header
}

require(realpath(__DIR__) . '/templates/header.php');
include_once 'templates/team_title.php';
include_once 'templates/team_players.php';
include_once 'templates/team_history.php';
?>


<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>


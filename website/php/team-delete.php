<?php
require_once '../php/init.php';
session_start();
$User = new User($db);
$Team = new TeamCollection($db);
$Players = new PlayerCollection($db);
if (isset($_GET['team_id']) && ($User->IsUserAdmin() || $User->IsOwnerOfATeam($_GET['team_id'], $_SESSION['user']['id'])))
{
    $Team->DeleteTeamById($_GET['team_id']);
    $Players->DeletePlayersByTeamId($_GET['team_id']);
}
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
    $message = "Team is verwijderd!";
    header("Location: ../public/teamsmenager.php?message=$message&mode=success");
}
$message = "Niet alle velden zijn ingevoeld!";
header("Location: ../public/teams.php");
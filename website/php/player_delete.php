<?php
require_once '../php/init.php';
session_start();
$User = new User($db);
$Team = new TeamCollection($db);
$Players = new PlayerCollection($db);
if (isset($_GET['player_id']) && isset($_GET['team_id']) && ($User->IsUserAdmin() || $User->IsOwnerOfATeam($_GET['team_id'], $_SESSION['user']['id'])))
{
    if ($Players->isPlayerInTeam($_GET['player_id'], $_GET['team_id']))
    {
        $Players->DeletePlayerById($_GET['player_id']);
        if ($Players->NummberOfPlayersByTeamId($_GET['team_id']) <= 3)
        {
            $Team->DeleteTeamFromPoul($_GET['team_id']);
        }
    }
}

header("Location: ../website/team.php");
<?php
require_once 'init.php';
session_start();
$User = new User($db);
$Team = new TeamCollection($db);
$Players = new PlayerCollection($db);
$poule = new PoulesCollection($db);

if (isset($_POST['team_id']) && isset($_POST['player_name']) && isset($_POST['player_lastname']) && isset($_POST['player_dcode']))
{
    $team_id = $_POST['team_id'];
    $player_name = $_POST['player_name'];
    $player_lastname = $_POST['player_lastname'];
    $player_dcode = $_POST['player_dcode'];


    if ($User->IsUserAdmin() || $User->IsOwnerOfATeam($team_id, $_SESSION['user']['id']))
    {
        $Players->AddPlayer($player_dcode, $player_name, $player_lastname, $team_id);

        if ($Players->NummberOfPlayersByTeamId($team_id) == 2)
        {
            $Team->SetTeamInPoul($team_id);
        }
        elseif($Players->NummberOfPlayersByTeamId($team_id) < 3)
        {
            $Team->DeleteTeamFromPoul($team_id);
        }

    }
}
else{
    echo "header";
}

<?php
require_once "db.php";
require_once 'Poules.php';
require_once 'Teams.php';
require_once 'Players.php';

//Basic Poul List (HOMEPAGE) REQUIRE

$teams = new Teams();
$poule = new Poules();

foreach ($poule->GetPoules() as $poule)
{
    echo $poule['naam'];
    echo '<br>';
    echo '<br>';
    foreach ($teams->GetTeamsByPuleID($poule['id']) as $team)
    {
        echo 'Team Name : '. $team['name'] . '   Gewoonen   '. $team['score']['win']. '  Verloren  '. $team['score']['lose']. '  Gelijkspel  ' . $team['score']['draw']. '  Team Score  ' .$team['score']['score'];
        echo '<br>';
    }
    echo '<br>';
}


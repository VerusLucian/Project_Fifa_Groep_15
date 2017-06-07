<?php
session_start();
require("init.php");
$teamCollection = new TeamCollection($db);

$teamname = $_GET['teamname'];
$teamimg = $_GET['teamimg'];
$teamdesc = $_GET['teamdesc'];
$memberid = $_SESSION['user']['id'];

if (empty($teamimg))
{
    $teamimg = "assets/img/anon.png";
}

if (!empty($teamname) && !empty($teamimg) && !empty($teamdesc))
{

    if ($teamCollection->NumberOfTeams() <= 14)
    {
        $teamCollection->AddTeam($teamname, $teamimg, $teamdesc, $memberid);
        $_SESSION['HaveTeam'] = true;

        $message = "Team succesvol toegevoegd!";
        header("Location: ../public/teams.php?message=$message&mode=success");
    }
    else{
        $message = "Maximale aantal teams bestaat all";
        header("Location: ../public/teams.php?message=$message");
    }

}
else
{
    $message = "De gegeven data is ongeldig!";
    header("Location: ../public/teams.php?message=$message");
}
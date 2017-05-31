<?php

require("init.php");
$teamCollection = new TeamCollection($db);

$teamname = $_GET['teamname'];
$teamimg = $_GET['teamimg'];
$teamdesc = $_GET['teamdesc'];
$memberid = 1;


$id = $_SESSION['id'];

if (empty($teamimg))
{
    $teamimg = "assets/img/anon.png";
}

if (!empty($teamname) && !empty($teamimg) && !empty($teamdesc))
{

    $teamCollection->AddTeam($teamname, $teamimg, $teamdesc, $memberid);

    $message = "Team succesvol toegevoegd!";
    header("Location: ../public/teams.php?message=$message");
}
else
{
    $message = "De gegeven data is ongeldig!";
    header("Location: ../public/teams.php?message=$message");
}
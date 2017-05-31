<?php

require("init.php");

$teamname = $_GET['teamname'];
$teamimg = $_GET['teamimg'];
$teamdesc = $_GET['teamdesc'];

$id = $_SESSION['id'];

if (empty($teamimg))
{
    $teamimg = "assets/img/anon.png";
}

if (!empty($teamname) && !empty($teamimg) && !empty($teamdesc))
{
    $sql = "INSERT INTO tbl_teams (name, img, description, created_by) VALUES ('$teamname', '$teamimg', '$teamdesc', '$id')";
    $db->query($sql);

    $message = "Team succesvol toegevoegd!";
    header("Location: ../public/teams.php?message=$message");
}
else
{
    $message = "De gegeven data is ongeldig!";
    header("Location: ../public/teams.php?message=$message");
}
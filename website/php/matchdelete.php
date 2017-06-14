<?php
session_start();
require_once 'init.php';
$match = new MatchCollection($db);

if (isset($_GET['match_id']))
{
    $match->DeleteMatchTeam($_GET['match_id']);
}

$message = "Match succesvol verwijderd!";

header("Location: ../public/adminpanel.php?message=$message");
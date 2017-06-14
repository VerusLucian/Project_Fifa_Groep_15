<?php
session_start();
require_once 'init.php';

if (isset($_POST['start_time']) && isset($_POST['duration_time']) && isset($_POST['poule_id']))
{
    $match = new MatchCollection($db);
    $match->MakePoulMatchesByPoulId($_POST['poule_id'], $_POST['start_time'], $_POST['duration_time']);
}

$message = "Match succesvol toegevoegd!";

header("Location: ../adminpanel.php?message=$message");
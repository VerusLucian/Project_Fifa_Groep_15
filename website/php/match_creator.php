<?php
session_start();
require_once 'init.php';

if (isset($_POST['start_time']) && isset($_POST['duration_time']) && isset($_POST['poule_id']))
{
    $match = new MatchCollection($db);
    $match->MakePoulMatchesByPoulId($_POST['poule_id'], $_POST['start_time'], $_POST['duration_time']);
}

$message = "Match succesvol toegevoegd!";
$url = parse_url($_SERVER['HTTP_REFERER']);

header("Location: ".$url['path']."?message=$message");
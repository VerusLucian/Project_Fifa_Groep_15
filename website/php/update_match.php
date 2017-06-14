<?php
session_start();
require_once 'init.php';
$match = new MatchCollection($db);

if (isset($_POST['score_team_a']) && isset($_POST['score_team_b']) && isset($_POST['start_time']) && isset($_POST['match_id']))
{
    $match->ScoreUpdate($_POST['match_id'], $_POST['score_team_a'], $_POST['score_team_b'], $_POST['start_time']);
}

<?php
require('init.php');

$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);
$machs = new MatchCollection($db);
$finaltabel = new FinalTabel($db);

var_dump($finaltabel->GetLeadTeamsByPoulId('2'));


<?php
require('init.php');

$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);
$machs = new MatchCollection($db);
$finaltabel = new FinalTabel($db);

$machs->MakePoulMatchesByPoulId('1');
?>
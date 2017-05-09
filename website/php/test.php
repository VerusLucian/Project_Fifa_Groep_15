<?php
require('init.php');

$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);


var_dump($timeTabel->GetTimeTabel());


//foreach ($poule->GetPoules() as $poule)
//{
//    echo $poule['naam'];
//    echo '<br>';
//    echo '<br>';
//    foreach ($teams->GetTeamByPuleId($poule['id']) as $team)
//    {
//        echo 'Team Name : '. $team['name'] . '   Gewoonen   '. $team['score']['win']. '  Verloren  '. $team['score']['lose']. '  Gelijkspel  ' . $team['score']['draw']. '  Team Score  ' .$team['score']['score'];
//        echo '<br>';
//    }
//    echo '<br>';
//}


<?php
require('init.php');

$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);
$machs = new MatchCollection($db);
$finaltabel = new FinalTabel($db);



//$sql = "SELECT * FROM `tbl_teams`";
//$list = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//
//$fp = fopen('file.csv', 'w');
//
//foreach ($list as $fields) {
//    fputcsv($fp, $fields);
//}
//
//fclose($fp);

var_dump($machs->MatchCollectionEndedByTeamId(4));
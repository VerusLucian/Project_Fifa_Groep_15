<?php
require('init.php');

$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);
$machs = new MatchCollection($db);
$finaltabel = new FinalTabel($db);
$login = new Login($db);
var_dump($login->login('lukasz5015@o2.pl', 'Qwerty1234'));



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

//$machs->UpdateMatchTimes('09:00:00', '00:15:00', '2');
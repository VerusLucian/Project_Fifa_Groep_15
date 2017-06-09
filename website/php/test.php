<?php
require('init.php');
session_start();
$teams = new TeamCollection($db);
$poule = new PoulesCollection($db);
$playerCollection = new PlayerCollection($db);
$timeTabel = new Timetabel($db);
$machs = new MatchCollection($db);
$finaltabel = new FinalTabel($db);
$login = new Login($db);
$user = new User($db);


$user->DeleteUser(32);



/*
 * CHECK RESERVE PLAYER
 * IF TRUE
 *  DO REST
 * IF NOT
 * DO rest witchout reserve
 */




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
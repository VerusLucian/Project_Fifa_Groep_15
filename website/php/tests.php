<?php
require_once "db.php";
require_once 'Poules.php';
require_once 'Teams.php';
require_once 'Players.php';


//function GetData()
//{
//    $sql        = "SELECT * FROM `tbl_poules`";
//    $sql2       = "SELECT * FROM `tbl_teams`";
//    $sql3       = "SELECT * FROM `tbl_players`";
//
//    $players    = connectToDataBase()->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
//    $poules     = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//    $teams      = connectToDataBase()->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
//
//    $arr_poules = array();
//    foreach ($poules as $poule)
//    {
//        foreach ($teams as $team)
//        {
//            foreach ($players as $player)
//            {
//                if ($player['team_id'] == $team['id'])
//                {
//                    array_push($team, $player);
//                }
//            }
//            if ($team['poule_id'] == $poule['id'])
//            {
//                array_push($poule, $team);
//            }
//        }
//        array_push($arr_poules, $poule);
//    }
//    return $arr_poules;
//}

$teams = new Teams();
$poule = new Poules();

echo 'Poule A';
echo '<br>';
echo '<br>';
foreach ($teams->GetTeamsByPuleID('1') as $team)
{
    echo 'Team Name : '. $team['name'] . 'Team Score : ' .$team['score']['score'];
    echo '<br>';
}

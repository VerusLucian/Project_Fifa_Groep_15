<?php
var_dump($_POST);
session_start();
require_once '../php/init.php';

$stmt = $db->prepare("UPDATE tbl_teams SET `name` = :name, `img` = :img, `description` = :desccription WHERE `id` = :id ");
$stmt->execute(array("id" => $_POST['teamid'], "name" => $_POST['teamname'], "img" => $_POST['teamimg'], "desccription" => $_POST['teamdesc']));

$message = "Team is aangepast!";
header("Location: ../public/teamsmenager.php?message=$message&mode=success");
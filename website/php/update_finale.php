<?php
var_dump($_POST);
session_start();
require_once 'init.php';

foreach ($_POST as $kay => $value)
{
    $sql = "UPDATE `tbl_finals` SET `team_id` = '$value' WHERE `position` = '$kay';";
    $db->query($sql);
}

$message = "Finale is aangepast !";
header("Location: ../public/adminpanel.php?message=$message&mode=success");
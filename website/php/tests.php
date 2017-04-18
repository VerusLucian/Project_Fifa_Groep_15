<?php
require_once "db.php";

$sql = "SELECT * FROM `tbl_players`";
$q = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

var_dump($q);
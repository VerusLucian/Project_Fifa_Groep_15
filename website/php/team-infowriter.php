<?php

$id = $_SESSION['id'];

$sql = "SELECT * FROM tbl_teams WHERE created_by='$id'";

$textsdata = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach($textsdata as $textdata)
{
    $teamname[]     = $textdata["name"];
    $teamimg[]        = $textdata["img"];
    $teamdesc[]     = $textdata["description"];
    $created_at[]   = $textdata["created_at"];
}

?>
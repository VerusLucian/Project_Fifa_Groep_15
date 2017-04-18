<?php
function connectToDataBase()
{
    $db = new PDO('mysql:host=localhost;dbname=project_fifa','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    return $db;
}
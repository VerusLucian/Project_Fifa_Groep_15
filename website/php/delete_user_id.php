<?php
session_start();
require_once 'init.php';
$User = new User($db);

if (isset($_GET['user_id']))
{
    $User->DeleteUser($_GET['user_id']);
}
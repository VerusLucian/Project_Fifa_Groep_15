<?php
session_start();
require_once '../../php/init.php';
$User = new User($db);

if (isset($_GET['user_id']))
{
    $User->MakeUserAdmin($_GET['user_id']);
}
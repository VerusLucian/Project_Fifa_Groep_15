<?php
session_start();
require_once '../php/init.php';
$User = new User($db);

if (isset($_GET['user_id']))
{
    $User->MakeUserAdmin($_GET['user_id']);
}

$message = "Gebruiker succesvol admin rank toegevoegd!";

$url = parse_url($_SERVER['HTTP_REFERER']);

header("Location: ".$url['path']."?message=$message");
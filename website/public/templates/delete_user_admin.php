<?php
session_start();
require_once '../../php/init.php';
$User = new User($db);

if (isset($_GET['user_id']))
{
    $User->MakeUserAdmin($_GET['user_id']);
}

$message = "Gebruiker succesvol admin rank verwijderd!";

header("Location: ../index.php?message=$message");
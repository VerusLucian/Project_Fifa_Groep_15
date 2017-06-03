<?php
session_start();

require_once 'init.php';
$Login = new Login($db);

$email       = $_GET['email'];
$password    = $_GET['password'];

if(!empty($email) && !empty($password))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        if ($Login->login($email, $password)) {
            $message = "U bent succesvol ingelogd!";
            header("Location: ../public/index.php?message=$message");
        }
        else
        {
            $message = "<span style='color: red'>De gegeven data kwam niet overeen!</span>";
            header("Location: ../public/login.php?message=$message");
        }
    }
    else
    {
        $message = "<span style='color: red'>Email is niet geldig!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}
else
{
    $message = "<span style='color: red'>Geen email en/of wachtwoord meegegeven!</span>";
    header("Location: ../public/login.php?message=$message");
}

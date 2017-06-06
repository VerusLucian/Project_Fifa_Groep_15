<?php
session_start();

require_once 'init.php';
$Login = new Login($db);

$email       = $_POST['email'];
$password    = $_POST['password'];

if(!empty($email) && !empty($password))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        if ($Login->login($email, $password)) {
            $message = "U bent succesvol ingelogd!";
            header("Location: ../public/index.php?message=$message&mode=success");
        }
        else
        {
            $message = "<span>De gegeven data kwam niet overeen!</span>";
            header("Location: ../public/login.php?message=$message");
        }
    }
    else
    {
        $message = "<span>Email is niet geldig!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}
else
{
    $message = "<span>Geen email en/of wachtwoord meegegeven!</span>";
    header("Location: ../public/login.php?message=$message");
}

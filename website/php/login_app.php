<?php

session_start();

if (isset($_SESSION['logged_in']))
{
    if ($_SESSION['logged_in'] == true)
    {
        $message = "<span style='color: red'>You are already logged in!</span>";
        header("Location: ../public/login.php?message=$message");
        exit();
    }
}

require("init.php");

$email          = trim($_GET['email']);
$passwordraw    = trim($_GET['password']);
$password       = md5($passwordraw);

if(!empty($email) && !empty($password))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $sql = "SELECT * FROM tbl_members WHERE email='$email' && password='$password'";
        $amount = $db->query($sql)->rowCount();

        if ($amount == 1) {
            echo "You are succesfully logged in!";
            $message = "U bent succesvol ingelogd!";
            header("Location: ../public/index.php?message=$message");
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $id[0];
        }
        else
        {
            echo "<span style='color: red'>Your given data did not match!</span>";
            $message = "<span style='color: red'>De gegeven data kwam niet overeen!</span>";
            header("Location: ../public/login.php?message=$message");

        }
    }
    else
    {
        echo "<span style='color: red'>Email is not valid!</span>";
        $message = "<span style='color: red'>Email is niet geldig!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}
else
{
    echo "<span style='color: red'>No email and/or password given!</span>";
    $message = "<span style='color: red'>Geen email en/of wachtwoord meegegeven!</span>";
    header("Location: ../public/login.php?message=$message");
}

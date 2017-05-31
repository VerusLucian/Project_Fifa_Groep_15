<?php

session_start();

require('init.php');

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
            $message = "You are succesfully logged in!";
            header("Location: ../public/index.php?message=$message");
            $_SESSION['logged_in'] = true;

        } else {
            $message = "<span style='color: red'>Your given data did not match!</span>";
            header("Location: ../public/login.php?message=$message");
        }
    }
    else
    {
        $message = "<span style='color: red'>Email is not valid!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}
else
{
    $message = "<span style='color: red'>No email and/or password given!</span>";
    header("Location: ../public/login.php?message=$message");
}
<?php

session_start();

require('database.php');

$email          = trim($_GET['email']);
$passwordraw    = trim($_GET['password']);
$password       = md5($passwordraw);

if(!empty($email) && !empty($password))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $sql = "SELECT * FROM tbl_members WHERE email='$email' && password='$password'";
        $amount = $database->query($sql)->rowCount();

        if ($amount == 1) {
            echo "You are succesfully logged in!";
            $message = "You are succesfully logged in!";
            header("Location: ../public/index.php?message=$message");
            $_SESSION['logged_in'] = true;
        } else {
            echo "<span style='color: red'>Your given data did not match!</span>";
            $message = "<span style='color: red'>Your given data did not match!</span>";
            header("Location: ../public/login.php?message=$message");

        }
    }
    else
    {
        echo "<span style='color: red'>Email is not valid!</span>";
        $message = "<span style='color: red'>Email is not valid!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}
else
{
    echo "<span style='color: red'>No email and/or password given!</span>";
    $message = "<span style='color: red'>No email and/or password given!</span>";
    header("Location: ../public/login.php?message=$message");
}
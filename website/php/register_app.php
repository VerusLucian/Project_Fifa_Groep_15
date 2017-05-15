<?php

require('database.php');

$name = trim($_GET['name']);
$lastname = trim($_GET['lastname']);
$email = trim($_GET['email']);
$passwordraw = trim($_GET['password']);
$passwordconfirmraw = trim($_GET['passwordconfirm']);

if (strlen($name) < 2 && strlen($name) > 15)
{
    echo "<span style='color: red'>Name is not valid!</span>";
    $message = "<span style='color: red'>Name is not valid!</span>";
    header("Location: ../public/register.php?message=$message");
}

if (strlen($lastname) < 2 && strlen($lastname) > 30)
{
    echo "<span style='color: red'>Lastname is not valid!</span>";
    $message = "<span style='color: red'>Lastname is not valid!</span>";
    header("Location: ../public/register.php?message=$message");
}

if ($passwordraw != $passwordconfirmraw)
{
    echo "<span style='color: red'>Password did not match!</span>";
    $message = "<span style='color: red'>Password did not match!</span>";
    header("Location: ../public/register.php?message=$message");
}

if(!empty($email) && !empty($passwordraw) && !empty($name) && !empty($lastname))
{
    if (strlen($passwordraw) >= 7 && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}/', $passwordraw))
    {
        $password = md5($passwordraw);
        file_put_contents("../storage/account_data.txt", $name . " " . $lastname . " - " . $email . " - " . $passwordraw . PHP_EOL, FILE_APPEND);
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "INSERT INTO tbl_members (email, password, firstname, lastname) VALUES ('$email', '$password', '$name', '$lastname')";

            try{
                $database->query($sql);
                echo "You are succesfully registed!";
                $message = 'You are succesfully registed!';
                header("Location: ../public/login.php?message=$message");
        } catch (PDOException $e)
            {
                echo "<span style='color: red'>User already exists</span>";
                $message = "<span style='color: red'>User already exists</span>";
                header("Location: ../public/register.php?message=$message");
            }
        }
        else
        {
            echo "<span style='color: red'>Email is not valid!</span>";
            $message = "<span style='color: red'>Email is not valid!</span>";
            header("Location: ../public/register.php?message=$message");
        }
    }
    else
    {
        echo "<span style='color: red'>Password is not valid!</span>";
        $message = "<span style='color: red'>Password is not valid!</span>";
        header("Location: ../public/register.php?message=$message");
    }
}
else
{
    echo "<span style='color: red'>Missing required date!</span>";
    $message = "<span style='color: red'>Missing required data!</span>";
    header("Location: ../public/register.php?message=$message");
}

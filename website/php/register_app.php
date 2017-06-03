<?php
require_once 'init.php';

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$passwordraw = $_POST['password'];
$passwordconfirmraw = $_POST['passwordconfirm'];

if (!empty($email) && !empty($passwordraw) && !empty($name) && !empty($lastname))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (!(strlen($name) < 2 && strlen($name) > 15) && !(strlen($lastname) < 2 && strlen($lastname) > 30)) {
            if (strlen($passwordraw) >= 7 && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}/', $passwordraw))
            {
                if ($passwordraw == $passwordconfirmraw) {
                    $register = new Register($name, $lastname, $email, $passwordraw, $db);
                    if (!$register->CheckOfAcountExist()) {
                            $register->Register();
                            $message = 'You are succesfully registed!';
                            header("Location: ../public/login.php?message=$message");
                    } else {
                        $message = "<span>Gebruiker bestaat al!</span>";
                        header("Location: ../public/login.php?message=$message");
                    }
                } else {
                    $message = "<span>Password did not match!</span>";
                    header("Location: ../public/register.php?message=$message");
                }
            } else{
                $message = "<span>Password is not valid!</span>";
                header("Location: ../public/login.php?message=$message");
            }
        } else {
            $message = "<span>Lastname/Name is niet geldig!</span>";
            header("Location: ../public/register.php?message=$message");
            exit();
        }
    } else {
        $message = "<span>Email is not valid!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}else{
    $message = "<span>Missing required data!</span>";
    header("Location: ../public/login.php?message=$message");
}
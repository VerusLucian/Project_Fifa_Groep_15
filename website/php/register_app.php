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
                            $message = 'Je bent succesvol geregistreerd!';
                            header("Location: ../public/login.php?message=$message&mode=success");
                    } else {
                        $message = "<span>Gebruiker bestaat al!</span>";
                        header("Location: ../public/login.php?message=$message");
                    }
                } else {
                    $message = "<span>Wachtwoord komt niet overeen!</span>";
                    header("Location: ../public/register.php?message=$message");
                }
            } else{
                $message = "<span>Wachtwoord is niet geldig!</span>";
                header("Location: ../public/login.php?message=$message");
            }
        } else {
            $message = "<span>Lastname/Naam is niet geldig!</span>";
            header("Location: ../public/register.php?message=$message");
            exit();
        }
    } else {
        $message = "<span>Email is niet geldig!</span>";
        header("Location: ../public/login.php?message=$message");
    }
}else{
    $message = "<span>Ontbrekende vereiste gegevens!</span>";
    header("Location: ../public/login.php?message=$message");
}
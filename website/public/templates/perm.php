<?php
if (!isset($_SESSION['logged_in']))
{
    $message = "<span style='color: red'>You do not have enough permissions!</span>";
    header("Location: ../public/login.php?message=$message");
    exit();
}
else
{
    if ($_SESSION['logged_in'] == false)
    {
        $message = "<span style='color: red'>You do not have enough permissions!</span>";
        header("Location: ../public/login.php?message=$message");
        exit();
    }
}
?>
<?php
require_once __DIR__ . '/../../php/init.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<nav class="navbar  navbar-inverse  navbar-solid-top">
    <div class="container">
        <button type="button" class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse">
            <span class="sr-only"> Toggle navigation</span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
        </button>

        <a class="navbar-brand" href="index.php">FIFA DEV EDITION</a>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $Login = new Login($db);
                    $User = new User($db);
                    if ($Login->isLoggedIn() == true)
                    {
                        echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Opties</a><ul class=\"dropdown-menu\">";
                        if ($User->IsUserAdmin())
                        {
                            echo '<li><a href="adminpanel.php">Admin panel</a></li>';
                        }
                        if ($User->UserHaveTeam($_SESSION['user']['id']))
                        {
                            echo '<li><a href="teamsmenager.php">Team beheren</a></li>';
                        }
                        else{
                            echo '<li><a href="teams.php">Team aanmaken</a></li>';
                        }
                echo "</ul></li>";
                    }
                ?>

                <?php
                if ($Login->isLoggedIn() == true)
                {
                    echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Welkom, ".$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']."</a><ul class=\"dropdown-menu\">";
                    echo '<li><a href="../php/login_app.php">Uitloggen</a></li>';
                    echo "</ul></li>";
                }
                else {
                    echo '<li><a href="login.php">Inloggen</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
    <?php
    $mode = "danger";
    if (isset($_GET['mode']))
    {
        $mode = $_GET['mode'];
    }
    if (isset($_GET['message'])) {
        echo '<div id="demo" class=" collapse in alert alert-'.$mode.'">';
        echo "<p>".$_GET['message'] ."<button type=\"button\" class=\"btn btn-link\" style='color: #000; padding: 0 ; margin: auto 10px; float: right' data-toggle=\"collapse\" data-target=\"#demo\">X</button></p>";
        echo "</div>";
    }
    ?>

<div class="container">
        <div class="main-content">

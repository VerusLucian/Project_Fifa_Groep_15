<?php
session_start();
require_once 'init.php';
$Login = new Login($db);
$Login->logout();
$message = "Je bent uitgelogd !";
header("Location: ../public/index.php?message=$message&mode=msg");

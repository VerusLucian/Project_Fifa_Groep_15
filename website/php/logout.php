<?php
session_start();
require_once 'init.php';
$Login = new Login($db);
$Login->logout();
echo "<span style='color: red'>logging out failed</span>";
header("Location: ../public/index.php?message=$message");

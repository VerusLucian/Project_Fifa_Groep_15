<?php
require('../php/database.php');
session_start();

$_SESSION['logged_in'] = false;

echo "<span style='color: red'>logging out failed</span>";

header("Location: ../public/index.php?message=$message");

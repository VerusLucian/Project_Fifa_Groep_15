<?php

require __DIR__ . '/../app/Database.php';

$pdo = new Database('84.26.202.94', 'project_fifa', 'root', '');
$db = $pdo->connect();

require __DIR__ . '/../app/User.php';
require __DIR__ . '/../app/Register.php';
require __DIR__ . '/../app/Login.php';
require __DIR__ .  '/../app/PoulesCollection.php';
require __DIR__ .  '/../app/TeamCollection.php';
require __DIR__ .  '/../app/PlayerCollection.php';
require __DIR__ .  '/../app/Timetabel.php';
require __DIR__ .  '/../app/MatchCollection.php';
require __DIR__ .  '/../app/FinalTabel.php';
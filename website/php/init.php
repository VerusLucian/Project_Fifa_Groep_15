<?php

require __DIR__ . '/Database.php';

$pdo = new Database('szyszkownica.pl', 'project_fifa', 'project_fifa', 'lolo');
$db = $pdo->connect();

require __DIR__ .  '/PoulesCollection.php';
require __DIR__ .  '/TeamCollection.php';
require __DIR__ .  '/PlayerCollection.php';
require __DIR__ .  '/Timetabel.php';
require __DIR__ .  '/MatchCollection.php';
require __DIR__ .  '/FinalTabel.php';
<?php

require __DIR__ . '/Database.php';

$pdo = new Database('szyszkownica.pl', 'project_fifa', 'project_fifa', 'lolo');
$db = $pdo->connect();

require_once 'PoulesCollection.php';
require_once 'TeamCollection.php';
require_once 'PlayerCollection.php';
<?php
require_once __DIR__ . '/../../php/init.php';
$Login = new Login($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <!-- you can link bootstrap if you want.   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <h1><a href="index.php">FIFA</a></h1>
                <?php
                if ($Login->isLoggedIn() == true)
                {
                    if ($Login->IsUserAdmin())
                    {
                        echo '<a href="#">Admin Panel</a>';
                    }
                    echo '<a href="teams.php">Teams aanmaken</a>';
                    echo '<a href="../php/logout.php">Logout</a>';
                }
                else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <?php
    if (isset($_GET['message'])) {
        echo '<section class="error">
        <p>'.$_GET['message'] .'</p>
    </section>';
    }
    ?>
    <div class="container">

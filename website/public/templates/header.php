<!--This header is just a suggestion. Do whatever you want with it!-->
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
                <h1><a href="index.php">Fifa Dev Edition</a></h1>
                <?php
                if(!isset($_SESSION['logged_in']))
                {
                    $message = "<span style='color: red'>Om teams aan te kunnen maken moet je ingelogt zijn</span>";
                    echo "<a href='login.php?message=$message'>Teams aanmaken</a>";
                }
                else
                {
                    if ($_SESSION['logged_in'] == false)
                    {
                        $message = "<span style='color: red'>Om teams aan te kunnen maken moet je inlogt zijn</span>";
                        echo "<a href='login.php?message=$message'>Teams aanmaken</a>";
                    }
                    else
                    {
                        echo '<a href="teams.php">Teams aanmaken</a>';
                    }
                }

                if(!isset($_SESSION['logged_in']))
                {
                    echo '<a href="login.php">Login</a>';
                }
                else
                {
                    if ($_SESSION['logged_in'] == false)
                    {
                        echo '<a href="login.php">Login</a>';
                    }
                    else
                    {
                        echo '<a href="../php/logout.php">Logout</a>';
                    }
                }
                ?>
            </nav>
        </div>
    </header>
    <div class="container">
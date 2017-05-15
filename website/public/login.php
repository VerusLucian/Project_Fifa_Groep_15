<?php require(realpath(__DIR__) . '/templates/header.php');
require '../php/init.php';
?>
    <div class="container">
        <div class="page-header">
            <h1>Login</h1>
        </div>
        <form class="col-xs-6 col-xs-offset-3" action="../php/login_app.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Example@live.nl" method="POST" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password1" method="POST" required>
            </div>
            <a href="register.php">Do not have an account yet?</a>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>

        <?php
        if (isset($_GET['message'])) {
            echo '<p>' . $_GET['message'] . '</p>';
        }
        ?>
    </div>
<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
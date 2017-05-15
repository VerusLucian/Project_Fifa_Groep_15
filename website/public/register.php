<?php require(realpath(__DIR__) . '/templates/header.php');
require '../php/init.php';
?>
        <div class="page-header">
            <h1>Register</h1>
        </div>
        <form action="../php/register_app.php">
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Donald" method="POST" required>
            </div>
            <div class="form-group">
                <label for="lastname">Achternaam:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Trump" method="POST" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Voorbeeld@live.nl" method="POST" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="W8woord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" method="POST" required>
            </div>
            <div class="form-group">
                <label for="passwordconfirm">Bevestig wachtwoord:</label>
                <input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control" placeholder="W8woord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" method="POST" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
        <a href="login.php">Already have an account?</a>
    <?php
    if (isset($_GET['message'])) {
        echo '<p>' . $_GET['message'] . '</p>';
    }
    ?>
<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
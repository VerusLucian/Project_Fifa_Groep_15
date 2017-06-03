<?php require(realpath(__DIR__) . '/templates/header.php');
$final = new FinalTabel($db);
?>
    <div class="main-content">
        <form class="col-xs-6" action="../php/login_app.php" method="post">
            <div class="page-header">
                <h2>Login</h2>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@example.nl" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Wachtword" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-success">
            </div>
        </form>

        <form class="col-xs-6" action="../php/register_app.php" method="post">
            <div class="page-header">
                <h2>Register</h2>
            </div>
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Donald" required>
            </div>
            <div class="form-group">
                <label for="lastname">Achternaam:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Trump" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@example.nl" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Wachtwoord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" required>
            </div>
            <div class="form-group">
                <label for="passwordconfirm">Bevestig wachtwoord:</label>
                <input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control" placeholder="Wachtwoord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="btn btn-success">
            </div>
        </form>
    </div>
<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
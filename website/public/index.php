<?php require(realpath(__DIR__) . '/templates/header.php');
        require '../php/init.php';
?>

    <div class="main-content">
        <div class="container">
            <h2>Poules</h2>
            <section class="container text-center col-xs-4">
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-center col-xs-4">Team</th>
                        <th class="text-center col-xs-4">Team</th>
                        <th class="text-center col-xs-4">Tijd</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>
        <?php include 'templates/tijdschema.php' ?>



    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');

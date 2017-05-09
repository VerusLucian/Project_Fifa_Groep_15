<?php require(realpath(__DIR__) . '/templates/header.php');
        require '../php/init.php';
?>


<!--    <div class="main-content">-->
<!--        <div class="container">-->
<!--            <h2>Poules</h2>-->
<!--            <section class="container text-center col-xs-4">-->
<!--                <table class="table table-striped text-center">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th class="text-center col-xs-4">Team</th>-->
<!--                        <th class="text-center col-xs-4">Win</th>-->
<!--                        <th class="text-center col-xs-4">Lose</th>-->
<!--                        <th class="text-center col-xs-4">Draw</th>-->
<!--                        <th class="text-center col-xs-4">Score</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php
//                    $team = new TeamCollection($db);
//
//                    foreach ($team->GetTeamByPuleId('1') as $team)
//                    {
//                        echo '<tr>';
//                        echo "<td>" .$team['name']."</td>";
//                        echo "<td>" .$team['win']."</td>";
//                        echo "<td>" .$team['lose']."</td>";
//                        echo "<td>" .$team['draw']."</td>";
//                        echo "<td>" .$team['score']."</td>";
//                        echo '</tr>';
//                    }
//                    ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </section>-->
<!--        </div>-->
        <?php
include 'templates/poules.php';
include 'templates/tijdschema.php' ?>




    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');

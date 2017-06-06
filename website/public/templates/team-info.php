<div class="container">
    <div class="teams">
        <div class="team-info">
            <form class="col-xs-6" action="../php/teams-toevoegen.php">
                <div class="page-header">
                    <h2>Jouw team</h2>
                </div>
                <div class="hero">
                    <div class="team-data">
                        <?php
                        echo "Team naam: $teamname[0]";
                        echo "Team aangemaakt op: $created_at[0]";
                        echo "Team beschrijving: $teamdesc[0]";
                        ?>
                    </div>
                    <div class="team-img">
                        <?php
                        echo "<img src=\"$teamimg[0]\" alt=\"anon\">";
                        ?>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- </body>
</html> -->
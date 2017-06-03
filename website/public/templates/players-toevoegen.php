<div class="container">
    <div class="teams">
        <div class="teams-toevoegen">
            <form class="col-xs-12" action="../php/speler_toevoegen.php" method="post">
                <div class="page-header">
                    <h3>Speler Toevoegen</h3>
                </div>
                <div class="form-group col-xs-4">
                    <label for="player_dcode">Studenten Nummer</label>
                    <input type="text" name="player_dcode" id="player_dcode" class="form-control" placeholder="Studenten Nummer" required>
                </div>
                <div class="form-group col-xs-4">
                    <label for="player_name">Speler Naam</label>
                    <input type="text" name="player_name" id="player_name" class="form-control" placeholder="Speler Naam" required>
                </div>
                <div class="form-group col-xs-4">
                    <label for="player_lastname">Speler Achternaam</label>
                    <input type="text" name="player_lastname" id="player_lastname" class="form-control" placeholder="Speler Achternaam" required>
                </div>
                <input class="hidden" name="team_id" value="<?php echo $_SESSION['team']?>" hidden>
                <div class="form-group col-xs-offset-5">
                    <input type="submit" value="Voeg speler toe" class="btn btn-success col-xs-3">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- </body>
</html> -->
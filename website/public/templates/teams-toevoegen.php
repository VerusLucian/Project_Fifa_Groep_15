<div class="container">
    <div class="teams">
        <div class="teams-toevoegen">
            <form class="col-xs-6" action="../php/teams-toevoegen.php">
                <div class="page-header">
                    <h2>Team aanmaken</h2>
                </div>
                <div class="form-group">
                    <label for="teamname">Team naam:</label>
                    <input type="text" name="teamname" id="teamname" class="form-control" placeholder="Naam" method="POST" required>
                </div>
                <div class="form-group">
                    <label for="teamimg">Team foto:</label>
                    <input type="text" name="teamimg" id="teamimg" class="form-control" placeholder="assets/img/anon.png" method="POST">
                </div>
                <div class="form-group">
                    <label for="teamdesc">Team beschrijving:</label>
                    <textarea name="teamdesc" id="teamdesc" class="form-control" placeholder="Beschrijving..." method="POST" rows="5" required></textarea>
                </div>
            <button type="submit" class="btn">Verzenden</button>
          </form>
        </div>
    </div>
</div>
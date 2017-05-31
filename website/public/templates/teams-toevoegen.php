<div class="container">
<<<<<<< Updated upstream
    <form action="">
        <div class="form-group">
            <input type="text" name="player[$i][dcode]" id="">
            <input type="text" name="player[$i][naam]">
            <input type="text" name="player[$i][achternaam]">
=======
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
            <button type="submit" class="btn">Submit</button>
          </form>
>>>>>>> Stashed changes
        </div>
    </div>
</div>
<!-- </body>
</html> -->
<div class="container">
    <div class="row">
        <br>
        <?php
        $teams = new TeamCollection($db);
        $poule = new PoulesCollection($db);
        $playerCollection = new PlayerCollection($db);

        $poule_number = 0;

        foreach ($poule->GetPoules() as $poule)
        {
            echo '<div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading score">'.$poule['naam'].'</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>W-L-D</th>
                        <th>TotalScore</th>
                    </tr>
                    </thead>
                    <tbody>';
                        foreach ($teams->GetTeamByPuleId($poule['id']) as $team)
                        {
                            echo '<tr>';
                            echo '<td><a href="team_info.php?team_id='.$team['id'].'">' . $team['name'] . '</a></td>';
                            echo '<td>' . $team['win'] .'-'.$team['lose'].'-'.$team['draw'].'</td>';
                            echo '<td>' . $team['score'] . '</td></tr>';
                            echo '</tr>';
                        }
            echo '</tbody>
                </table>
            </div>

        </div>';
        }

        ?>
    </div>
</div>
<div class="container">

        <?php
        $teams = new TeamCollection($db);
        $poule = new PoulesCollection($db);
        $playerCollection = new PlayerCollection($db);

        $temp = 0;

        foreach ($poule->GetPoules() as $poule)
        {
            $temp++;
            if ($temp == 1)
            {
                echo '    <div class="row">
        <br>';
            }
            echo '<div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading score">'.$poule['naam'].'</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>W-V-G</th>
                        <th>Score</th>
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

            if ($temp == 2)
            {
                echo '</div>';
                $temp = 0;
            }
        }
        ?>

</div>
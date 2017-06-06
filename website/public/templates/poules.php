<div class="score">
    <div class="container">
        <ul>
            <?php
            $teams = new TeamCollection($db);
            $poule = new PoulesCollection($db);
            $playerCollection = new PlayerCollection($db);

            $count = 0;

            foreach ($poule->GetPoules() as $poule)
            {
                $count ++;
                echo '<div class="item">';
                echo '<h3>' . $poule['naam'] . '</h3>';
                echo '<section class="container text-center col-xs-12"><table class="table table-striped text-center"><thead><tr>';
                echo '<th class="text-center col-xs-4">Team</th>' . '   <th class="text-center col-xs-4">Gewonnen</th>  ' . '  <th class="text-center col-xs-4">Verloren</th>  ' . '  <th class="text-center col-xs-4">Geijkspel</th>  ' . '  <th class="text-center col-xs-4">TeamScore</th></tr>  ';
                echo '</thead><tbody>';
                foreach ($teams->GetTeamByPuleId($poule['id']) as $team)
                {
                    echo '<tr><td class="text-center col-xs-4"><a href="team_info.php?team_id='.$team['id'].'">' . $team['name'] . '</a></td>' . '<td class="text-center col-xs-4">' . $team['win'] . '</td>' . '<td class="text-center col-xs-4">' . $team['lose'] . '</td>' . '<td class="text-center col-xs-4">' . $team['draw'] . '</td>' . '<td class="text-center col-xs-4">' . $team['score'] . '</td></tr>';
                }
                echo '</tbody></table></section><br></div>';

                if (($count % 2) == 0)
                {
                    echo '</ul><ul>';
                }
            }
            ?>
        </ul>
    </div>
</div>
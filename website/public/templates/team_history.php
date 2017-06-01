<?php

?>
<div class="container">
    <h2>Geschiedenis</h2>
    <table class="table text-center">
        <thead>
        <tr>
            <th class="text-center col-xs-2">Tijd</th>
            <th class="text-center col-xs-4">Team</th>
            <th class="text-center col-xs-2">Score</th>
            <th class="text-center col-xs-4">Team</th>
      </tr>
        </thead>
        <tbody>
        <?php
        $match = new MatchCollection($db);
        $arr_matches = $match->MatchCollectionEndedByTeamId($team_id);

        foreach ($arr_matches as $item)
        {
            echo '<tr class="danger">';
            echo "<td>" .$item['start_time']."</td>";
            echo "<td>" .$item['team_a']."</td>";
            echo "<td>" .$item['score_team_a']." : ". $item ['score_team_b'];
            echo "<td>" .$item['team_b']."</td>";
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

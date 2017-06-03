<?php
$match = new MatchCollection($db);
if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
    $arr_matches = $match->MatchCollectionEndedByTeamId($team_id);
}
elseif(isset($_SESSION['team']))
{
    $team_id = $_SESSION['team']['id'];
    $arr_matches = $match->MatchCollectionEndedByTeamId($team_id);
}


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



        foreach ($arr_matches as $item)
        {
            if ($match->WinorloeseByTeamId($item, $team_id) == 'win')
            {
                echo '<tr class="success">';
            }
            elseif($match->WinorloeseByTeamId($item, $team_id) == 'lose')
            {
                echo '<tr class="danger">';
            }
            elseif($match->WinorloeseByTeamId($item,$team_id) == 'draw'){
                echo '<tr class="warning">';
            }

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

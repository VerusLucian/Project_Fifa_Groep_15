<?php
/**
 * Created by PhpStorm.
 * User: waela
 * Date: 6/1/2017
 * Time: 9:44 AM
 */

?>
    <div class="team_players">
        <?php
        $arr_players = $players->GetPlayerCollectionByTeamId($team_id);
            foreach ($arr_players as $player)
            {
                echo '<div class="players">';
                echo "<p>".$player['first_name']. "</p>";
                echo "<p>".$player['last_name']. "</p>";
                echo "<p>".$player['student_id']. "</p>";
                echo "</div>";
            }
?>
    </div>

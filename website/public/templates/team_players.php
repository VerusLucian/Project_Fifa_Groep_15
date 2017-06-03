<?php
$players = new PlayerCollection($db);

if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
}
elseif(isset($_SESSION['team']))
{
    $team_id = $_SESSION['team']['id'];
}
$arr_players = $players->GetPlayerCollectionByTeamId($team_id);

$owner = $User->IsOwnerOfTeam($team_id, $_SESSION['user']['id']);

?>
    <div class="team_players">
        <?php
            foreach ($arr_players as $player)
            {
                echo '<div class="players">';
                echo "<p>".$player['first_name']. "</p>";
                echo "<p>".$player['last_name']. "</p>";
                echo "<p>".$player['student_id']. "</p>";
                if ($owner)
                {
                    echo '<a href="#">DELET</a>';
                }
                echo "</div>";
            }
?>
    </div>

<?php
$players = new PlayerCollection($db);

if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
}
elseif(isset($_SESSION['team']))
{
    $team_id = $_SESSION['team'];
}
$arr_players = $players->GetPlayerCollectionByTeamId($team_id);

$owner = NULL;
if (isset($_SESSION['user']))
{
    $owner = $User->IsOwnerOfATeam($team_id, $_SESSION['user']['id']);
}

?>
    <div class="team_players">
        <?php
            foreach ($arr_players as $player)
            {
                echo '<div class="players">';
                echo "<p>Studentennummer: <span>".$player['student_id']. "</span></p>";
                echo "<p>Naam: <span>".$player['first_name']. "</span></p>";
                echo "<p>Achternaam: <span>".$player['last_name']. "</span></p>";
                if ($owner)
                {
                    echo '<a class="btn btn-danger" href="../php/player_delete.php?player_id='.$player['id'].'&team_id='.$_SESSION['team'].'">Verwijder speler</a>';
                }
                echo "</div>";
            }
?>
    </div>

<?php
$team = new TeamCollection($db);
if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
    $arr_team = $team->GetTeamById($team_id);
}
elseif(isset($_SESSION['team']))
{
    $team_id = $_SESSION['team'];
    $arr_team = $team->GetTeamById($team_id);
}

$user = new User($db);

$owner = NULL;

if  (isset($_SESSION['user']))
{
    $owner = $User->IsOwnerOfATeam($team_id, $_SESSION['user']['id']);
}


?>
<div class="container">
    <div class="title">
    <div class="logo">
        <img src=" <?php echo $arr_team['img']; ?>" alt="" height="200px" width="200px">
    </div>
    <div class="head">
        <h1><?php echo $arr_team['name']; ?></h1>
        <p> <?php echo $arr_team['description'];?></p>
    </div>
    <div class="results">
        <p style="color: #15a768">W:<?php echo $arr_team['win']; ?></p>
        <p style="color: #ff0000">V:<?php echo $arr_team['lose']; ?></p>
        <p style="color: #ffd700">G:<?php echo $arr_team['draw']; ?></p>
        <p>P:<?php echo $arr_team['score']; ?></p>
        <?php
        if ($owner)
        {
            echo '<br>';
            echo '<div class="btn-group">';
            echo '<button class="btn btn-warning" data-toggle="collapse" data-target="#teamedit">Edit</button>';
            echo '<a class="btn btn-danger" href="../php/team-delete.php?team_id='.$arr_team['id'].'">Verwijder Team</a>';
            echo '</div>';
        }
        ?>
    </div>
    </div>

    <?php
        if ($owner)
        {
            echo '<div id="teamedit" class="collapse">
    <form action="../php/teamedit.php" method="post">
        <div class="page-header">
            <h2>Team Edit</h2>
        </div>
        <div class="form-group col-xs-6">
            <label for="teamname">Team naam:</label>
            <input type="text" name="teamname" id="teamname" class="form-control" value="'. $arr_team['name'].'" method="POST" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="teamimg">Team foto:</label>
            <input type="text" name="teamimg" id="teamimg" class="form-control" value="' .$arr_team['img'] .'" method="POST">
        </div>
        <div class="form-group col-xs-12">
            <label for="teamdesc">Team beschrijving:</label>
            <textarea name="teamdesc" id="teamdesc" class="form-control" method="POST" rows="5" style="width: 100%">'. $arr_team['description'] .'</textarea>
        </div>
        <button type="submit" class="btn btn-success col-xs-4 col-xs-offset-4">Edit</button>
    </form>
    </div>';
        }
    ?>
</div>

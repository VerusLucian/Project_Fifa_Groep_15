<?php
$team = new TeamCollection($db);
if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
    $arr_team = $team->GetTeamById($team_id);
}
elseif(isset($_SESSION['team']))
{
    $team_id = $_SESSION['team']['id'];
    $arr_team = $team->GetTeamById($team_id);
}
?>
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
    </div>
</div>

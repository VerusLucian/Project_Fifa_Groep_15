<?php
/**
 * Created by PhpStorm.
 * User: waela
 * Date: 6/1/2017
 * Time: 9:23 AM
 */


if (isset($_GET['team_id']))
{
    $team_id = $_GET['team_id'];
    $arr_team = $team->GetTeamById($team_id);

}
else {
    //header
}

?>
<div class="container">
    <div class="logo">
        <img src=" <?php echo $arr_team['img']; ?>" alt="" height="100px" width="100px">
    </div>
    <div class="head">
        <h1><?php echo $arr_team['name']; ?></h1>
        <p> <?php echo $arr_team['description'];?></p>
    </div>
    <div class="results">
        <p>W:<?php echo $arr_team['win']; ?></p>
        <p>V:<?php echo $arr_team['lose']; ?></p>
        <p>G:<?php echo $arr_team['draw']; ?></p>
        <p>P:<?php echo $arr_team['score']; ?></p>
    </div>
</div>

<?php
session_start();
require(realpath(__DIR__) . '/templates/header.php');

$match = new MatchCollection($db);
$arr_match = $match->GetMatchById($_GET['match_id']);
var_dump($arr_match);
?>


<div class="container">
    <form  class="col-xs-12" action="../php/update_match.php" method="post">
        <div class="form-group">
            <label for="inlineFormInput">Score Team A</label>
            <input type="number" class="form-control col-xs-12" style="width: 40%;" id="inlineFormInput" value="<?php if ($arr_match['score_team_a'] != NULL){ echo $arr_match['score_team_a'];} ?>" name="score_team_a" placeholder="Score team A">
        </div>
        <div class="form-group">
            <label for="inlineFormInput">Score Team B</label>
            <input type="number" class="form-control col-xs-12" style="width: 40%;" id="inlineFormInputGroup" name="score_team_b" value="<?php if ($arr_match['score_team_b'] != NULL){ echo $arr_match['score_team_b'];} ?>" placeholder="Score team B">
        </div>
        <div class="form-group">
            <label for="inlineFormInput">Time</label>
            <input type="time" class="form-control col-xs-12" style="width: 40%;" id="inlineFormInput" name="start_time" value="<?php echo $arr_match['start_time'] ?>">
        </div>
        <input type="text" name="match_id" value="<?php echo $arr_match['id'] ?>" hidden>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
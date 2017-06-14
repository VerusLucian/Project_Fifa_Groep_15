<?php
session_start();
require(realpath(__DIR__) . '/templates/header.php');
?>


<form class="form-inline" action="../php/match_creator.php" method="post">
    <input type="number" class="form-control" style="width: 40%;" id="inlineFormInput" name="start_time" placeholder="Score team A">
    <input type="number" class="form-control" style="width: 40%;" id="inlineFormInputGroup" name="duration_time" placeholder="Score team B">
    <input type="time" class="form-control" style="width: 40%;" id="inlineFormInput" name="start_time" value="">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
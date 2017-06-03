<?php
    $final = new FinalTabel($db);
    $pule_a = $final->GetLeadTeamsByPoulId('1');
    $pule_b = $final->GetLeadTeamsByPoulId('2');
    $pule_c = $final->GetLeadTeamsByPoulId('3');
    $pule_d = $final->GetLeadTeamsByPoulId('4');

?>
<div class="container">
    <div class="dropdown">
        <div class="row">
            <div class="col-md-2">
                <p><?php if (!empty($pule_a['0'])){ echo  $pule_a['0']['name'];}else { echo '1st Plaats Poule A';}?></p>
                <p><?php if (!empty($pule_c['0'])){ echo  $pule_c['0']['name'];}else { echo '1st Plaats Poule C';}?></p>
            </div>
            <div class="col-md-2 col-md-offset-3" style="justify-content: flex-end;">
                <h2>Winnaar</h2>
                <p>Team</p>
            </div>
            <div class="col-md-2 col-md-offset-3">
                <p><?php if (!empty($pule_a['1'])){ echo  $pule_a['1']['name'];}else { echo '2de Plaats Poule A';}?></p>
                <p><?php if (!empty($pule_c['1'])){ echo  $pule_c['1']['name'];}else { echo '2de Plaats Poule C';}?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <p>Team</p>
                <p>Team</p>
            </div>
            <div class="col-md-2" style="justify-content: center;">
                <p>Team</p>
            </div>
            <div class="col-md-2" style="justify-content: center;">
                <p>Team</p>
            </div>
            <div class="col-md-2">
                <p>Team</p>
                <p>Team</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <p><?php if (!empty($pule_b['0'])){ echo  $pule_b['0']['name'];}else { echo '1st Plaats Poule B';}?></p>
                <p><?php if (!empty($pule_d['0'])){ echo  $pule_d['0']['name'];}else { echo '1st Plaats Poul D';}?></p>
            </div>
            <div class="col-md-2 col-md-offset-8">
                <p><?php if (!empty($pule_b['1'])){ echo  $pule_b['1']['name'];}else { echo '2de Plaats Poule B';}?></p>
                <p><?php if (!empty($pule_d['1'])){ echo  $pule_d['1']['name'];}else { echo '2de Plaats Poule D';}?></p>
            </div>
        </div>
        <div class="row">


        </div>
    </div>
</div>
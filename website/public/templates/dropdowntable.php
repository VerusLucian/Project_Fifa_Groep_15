<?php
    $final = new FinalTabel($db);
    $pule_a = $final->GetLeadTeamsByPoulId('1');
    $pule_b = $final->GetLeadTeamsByPoulId('2');
    $pule_c = $final->GetLeadTeamsByPoulId('3');
    $pule_d = $final->GetLeadTeamsByPoulId('4');
?>
<div class="container">
    <h2>Speelschema</h2>
    <div class="dropdowntable">
        <div class="row">
            <div class="col-xs-2">
                <p><?php if (!empty($pule_a['0'])){ echo  $pule_a['0']['name'];}else { echo '1st plaats poule A';}?></p>
                <p><?php if (!empty($pule_c['0'])){ echo  $pule_c['0']['name'];}else { echo '1st plaats poule C';}?></p>
            </div>
            <div class="col-xs-2 col-xs-offset-3" style="justify-content: flex-end;">
                <h2>Winnaar</h2>
                <p>Team</p>
            </div>
            <div class="col-xs-2 col-xs-offset-3">
                <p><?php if (!empty($pule_a['1'])){ echo  $pule_a['1']['name'];}else { echo '2de plaats poule A';}?></p>
                <p><?php if (!empty($pule_c['1'])){ echo  $pule_c['1']['name'];}else { echo '2de plaats poule C';}?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-xs-offset-2">
                <p>Team</p>
                <p>Team</p>
            </div>
            <div class="col-xs-2" style="justify-content: center;">
                <p>Team</p>
            </div>
            <div class="col-xs-2" style="justify-content: center;">
                <p>Team</p>
            </div>
            <div class="col-xs-2">
                <p>Team</p>
                <p>Team</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2">
                <p><?php if (!empty($pule_b['0'])){ echo  $pule_b['0']['name'];}else { echo '1st plaats poule B';}?></p>
                <p><?php if (!empty($pule_d['0'])){ echo  $pule_d['0']['name'];}else { echo '1st plaats poule D';}?></p>
            </div>
            <div class="col-xs-2 col-xs-offset-8">
                <p><?php if (!empty($pule_b['1'])){ echo  $pule_b['1']['name'];}else { echo '2de plaats poule B';}?></p>
                <p><?php if (!empty($pule_d['1'])){ echo  $pule_d['1']['name'];}else { echo '2de plaats poule D';}?></p>
            </div>
        </div>
    </div>
</div>
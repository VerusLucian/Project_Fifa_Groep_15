<?php
session_start();
require_once '../php/init.php';
require(realpath(__DIR__) . '/templates/header.php');
$Users = new User($db);
$Team = new TeamCollection($db);
$Poule = new PoulesCollection($db);
$final = new FinalTabel($db);
$TimeTabel = new Timetabel($db);
?>
<?php


$temp = 0;

foreach ($Poule->GetPoules() as $poule)
{
    $temp++;
    if ($temp == 1)
    {
        echo '    <div class="row">
        <br>';
    }
    echo '<div class="col-sm-6">
            <div class="panel panel-success">
                <div class="pull-right">
                    <button style="margin: 5px 5px 0 0" class="btn btn-success btn-sm " data-toggle="collapse" data-target="#poule'.$poule['id'].'"> Wedstrijd Maken</button>
                </div>
                <div class="panel-heading score">'.$poule['naam'].'</div>
                    <div id="poule'.$poule['id'].'" class="collapse">
                        <form class="form-inline" action="../php/match_creator.php" method="post">
                            <input type="time" class="form-control" style="width: 40%;" id="inlineFormInput" name="start_time" placeholder="Begin Tijd">
                            <input type="time" class="form-control" style="width: 40%;" id="inlineFormInputGroup" name="duration_time" placeholder="Tijd van Wedstrijd">
                            <input type="text" name="poule_id" value="'.$poule['id'].'" hidden>
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>W-V-G</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>';
    foreach ($Team->GetTeamByPuleId($poule['id']) as $team)
    {
        echo '<tr>';
        echo '<td><a href="team_info.php?team_id='.$team['id'].'">' . $team['name'] . '</a></td>';
        echo '<td>' . $team['win'] .'-'.$team['lose'].'-'.$team['draw'].'</td>';
        echo '<td>' . $team['score'] . '</td></tr>';
        echo '</tr>';
    }
    echo '</tbody>
                </table>
            </div>

        </div>';

    if ($temp == 2)
    {
        echo '</div>';
        $temp = 0;
    }
}
?>



<div class="container">
    <div class="row">
        <div class="panel panel-default filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Teams</h3>
            </div>
            <table  class="table">
                <thead>
                <tr class="filters">
                    <th>Team</th>
                    <th>Team</th>
                    <th>Tijd</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $arr_timetabel = $TimeTabel->GetTimeTabel();

                foreach ($arr_timetabel as $item)
                {
                    echo '<tr>';
                    echo "<td><a href='team_info.php?team_id=".$item['team_id_a']."'>" .$item['team_a']."</a></td>";
                    echo "<td><a href='team_info.php?team_id=".$item['team_id_b']."'>" .$item['team_b']."</a></td>";
                    echo "<td>" .$item['time']."</td>";
                    echo '<td><div class="btn-group" role="group" style="float: right">
                            <a href="edit_match.php?match_id='.$item['id'].'" class="btn btn-default btn-sm">Wijzigen</a>
                            <a href="../php/matchdelete.php?match_id='.$item['id'].'" class="btn btn-danger btn-sm">Verwijderen</a>
                            </div></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Gebruikers</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs" data-toggle="collapse" data-target="#usertable">Vertonen/verbergen</button>
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span></button>
                </div>
            </div>
            <div id="usertable" class="collapse in" style="max-height: 500px; overflow: scroll; overflow-x: hidden;">
            <table  class="table">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Naam" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Achternaam" disabled></th>
                    <th><input type="text" class="form-control" placeholder="E-mail" disabled></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                    foreach ($Users->GetUserCollection() as $user)
                    {
                        echo '<tr>';
                        echo '<td>'. $user['firstname']. '</td>';
                        echo '<td>'. $user['lastname']. '</td>';
                        echo '<td>'. $user['email']. '</td>';
                        echo '<td><div class="btn-group" role="group" style="float: right">';
                                        if (!$Users->IsUserAdminById($user['id']))
                                        {
                                            echo '<a href="templates/make_user_admin.php?user_id='.$user['id'].'" class="btn btn-warning btn-sm">Maak Admin</a>';

                                        }
                                        if ($Users->IsUserAdminById($user['id']))
                    {
                        echo '<a href="templates/delete_user_admin.php?user_id='.$user['id'].'" class="btn btn-primary btn-sm">Verwijder Admin</a>';
                    }
                        echo '<a href="../php/delete_user_id.php?user_id='.$user['id'].'" class="btn btn-danger btn-sm">Verwijderen</a>
                                    </div></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Teams</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs" data-toggle="collapse" data-target="#teamstable">Vertonen/verbergen</button>
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span></button>
                </div>
            </div>
            <div id="teamstable" class="collapse in" style="max-height: 500px; overflow: scroll; overflow-x: hidden;">
                <table  class="table">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Team naam" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Poule" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Gemaakt door" disabled></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $Team = new TeamCollection($db);
                    $Poule = new PoulesCollection($db);
                    foreach ($Team->GetTeams() as $team)
                    {
                        echo '<tr>';
                        echo '<td>'. $team['name'].'</td>';
                        echo '<td>'.$Poule->GetPouleById($team['poule_id'])['naam']. '</td>';
                        echo '<td>'. $Users->GetUserById($team['created_by'])['firstname']. ' '.$Users->GetUserById($team['created_by'])['lastname'] . '</td>';
                        echo '<td><div class="btn-group" role="group" style="float: right">
                                    <a href="team_info.php?team_id='.$team['id'].'" class="btn btn-default btn-sm">Ga naar team</a>
                                    <a href="../php/team-delete.php?team_id='.$team['id'].'" class="btn btn-danger btn-sm">Verwijderen</a>
                                    </div></td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });
</script>


<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>


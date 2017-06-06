<?php //Tijdschema ?>
<div class="container">
    <h2>Tijdschema</h2>
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th class="text-center col-xs-4">Team</th>
            <th class="text-center col-xs-4">Team</th>
            <th class="text-center col-xs-4">Tijd</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $TimeTabel = new Timetabel($db);
        $arr_timetabel = $TimeTabel->GetTimeTabel();

        foreach ($arr_timetabel as $item)
        {
            echo '<tr>';
            echo "<td><a href='team_info.php?team_id=".$item['team_id_a']."'>" .$item['team_a']."</a></td>";
            echo "<td><a href='team_info.php?team_id=".$item['team_id_b']."'>" .$item['team_b']."</a></td>";
            echo "<td>" .$item['time']."</td>";
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
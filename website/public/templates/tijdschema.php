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
            echo "<td>" .$item['team_a']."</td>";
            echo "<td>" .$item['team_b']."</td>";
            echo "<td>" .$item['time']."</td>";
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
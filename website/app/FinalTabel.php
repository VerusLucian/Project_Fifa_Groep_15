<?php

class FinalTabel
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function GetLeadTeamsByPoulId($poul_id)
    {
        $teams = new TeamCollection($this->db);

        $arr_leadteams = array();
        foreach (array_slice($teams->GetTeamByPuleId($poul_id), 0, 2) as $item)
        {
            if ($item['win'] == 0 && $item['lose'] == 0 && $item['draw'] == 0)
            {

            }else
            {
                array_push($arr_leadteams, $item);
            }

        }
        return $arr_leadteams;
    }

    public function CheckPosition($position, $team_id)
    {
        $sql = "SELECT * FROM `tbl_finals` WHERE `position` = '$position' AND `team_id` = '$team_id';";


        if ($this->db->query($sql)->rowCount() == 1)
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function GetTeamByPosition($position)
    {
        $sql = "SELECT `team_id` FROM `tbl_finals` WHERE `position` = '$position';";
        return $this->db->query($sql)->fetch()['team_id'];
    }

}
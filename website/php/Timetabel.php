<?php

class Timetabel
{
    private $matchCollection;
    private $timetabel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $MatchCollection = new MatchCollection($this->db);
        $this->matchCollection = $MatchCollection->GetMatchCollection();
        $this->timetabel = $this->SetTimeTabel();
    }

    private function SetTimeTabel()
    {
        $team = new TeamCollection($this->db);
        $arr_timetabel = array();

        foreach ($this->matchCollection as $match)
        {
            $TeamA = $team->GetTeamById($match['team_id_a']);
            $TeamB = $team->GetTeamById($match['team_id_b']);

            $temp_arr_timetabel = [
                'team_a'    =>   $TeamA['name'],
                'team_b'    =>   $TeamB['name'],
                'time'      =>   $match['start_time']
            ];

            array_push($arr_timetabel, $temp_arr_timetabel);

        }

        return $arr_timetabel;
    }

    public function GetTimeTabel()
    {
        return $this->timetabel;
    }

}
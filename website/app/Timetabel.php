<?php
class Timetabel
{
    private $timetabel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;

        $this->timetabel = $this->SetTimeTabel();
    }

    private function SetTimeTabel()
    {
        $team = new TeamCollection($this->db);
        $MatchCollection = new MatchCollection($this->db);
        $matchCollection = $MatchCollection->GetMatchCollection();
        $arr_timetabel = array();

        foreach ($matchCollection as $match)
        {
            if ($match['score_team_a'] == NULL && $match['score_team_b'] == NULL && $match['start_time'] != NULL)
            {
                $TeamA = $team->GetTeamById($match['team_id_a']);
                $TeamB = $team->GetTeamById($match['team_id_b']);

                $temp_arr_timetabel = [
                    'id'        =>   $match['id'],
                    'team_a'    =>   $TeamA['name'],
                    'team_b'    =>   $TeamB['name'],
                    'time'      =>   substr($match['start_time'],0,5),
                    'team_id_a' =>   $TeamA['id'],
                    'team_id_b' =>   $TeamB['id']

                ];

                array_push($arr_timetabel, $temp_arr_timetabel);
            }
        }

        return $arr_timetabel;
    }

    public function GetTimeTabel()
    {
        return $this->timetabel;
    }

}
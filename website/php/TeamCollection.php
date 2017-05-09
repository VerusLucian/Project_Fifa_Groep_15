<?php
class TeamCollection
{
    protected $teams;
    protected $db;

    public function __construct($db)
    {

        $this->db  = $db;
        $this->teams = $this->GetTeamsFromDb();

    }

    private function GetTeamsFromDb()
    {

        $sql        = "SELECT * FROM `tbl_teams`";
        $teams      = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $arr_teams  = array();

        foreach ($teams as $team)
        {
            $time = $team + $this->GetTeamScoreByTeamId($team['id']);
            array_push($arr_teams, $time);
        }



        return $this->aasort($arr_teams,"score");
    }

    public function aasort (&$array, $key) {
        $sorter=array();
        $ret=array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii]=$va[$key];
        }
        arsort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii]=$array[$ii];
        }
        return $array=$ret;
    }


    public function GetTeamByPuleId($pule_id)
    {
        $teams = array();

        foreach ($this->teams as $team) {
            if ($team['poule_id'] == $pule_id) {
                array_push($teams, $team);
            }
        }

        return $teams;
    }

    public function GetTeamById($team_id)
    {
        foreach ($this->teams as $team) {
            if ($team['id'] == $team_id) {
                return $team;
            }
        }

        return false;
    }

    public function GetTeams()
    {
        return $this->teams;
    }

    public function GetTeamScoreByTeamId($team_id)
    {
        $arr_socre = array(
            'win'   => 0,
            'lose'  => 0,
            'draw'  => 0,
            'score' => 0
        );

        $sql            = "SELECT * FROM `tbl_matches` WHERE `team_id_a` = '$team_id' OR `team_id_b` = '$team_id' AND `score_team_a` IS NOT NULL AND `score_team_b` IS NOT NULL ";
        $arr_matches    = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($arr_matches as $match) {
            if ($match['team_id_a'] == $team_id) {
                if ($match['score_team_a'] > $match['score_team_b']) {
                    $arr_socre['win'] += 1;
                } elseif ($match['score_team_a'] < $match['score_team_b']) {
                    $arr_socre['lose'] += 1;
                } elseif ($match['score_team_a'] == $match['score_team_b']) {
                    $arr_socre['draw'] += 1;
                }
            }
            elseif ($match['team_id_b'] == $team_id) {
                if ($match['score_team_b'] > $match['score_team_a']) {
                    $arr_socre['win'] += 1;
                } elseif ($match['score_team_b'] < $match['score_team_a']) {
                    $arr_socre['lose'] += 1;
                } elseif ($match['score_team_b'] == $match['score_team_a']) {
                    $arr_socre['draw'] += 1;
                }
            }
        }

        $arr_socre['score'] += $arr_socre['win'] * 3;
        $arr_socre['score'] += $arr_socre['draw'] * 1;

        return $arr_socre;
    }
}


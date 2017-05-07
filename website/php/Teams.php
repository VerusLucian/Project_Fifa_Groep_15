<?php
require_once "db.php";

class Teams
{
    protected $teams;

    public function __construct()
    {
        $this->teams = $this->GetTeamsFromDb();


    }

    private function GetTeamsFromDb()
    {
        $sql        = "SELECT * FROM `tbl_teams`";
        $teams      = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $arr_teams  = array();

        foreach ($teams as $team)
        {
            $time = $team + array('score' => $this->GetTeamScoreByTeamId($team['id']));
            array_push($arr_teams, $time);
        }

        return $arr_teams;
    }

    public function GetTeamsByPuleID($pule_id)
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
        $arr_matches    = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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


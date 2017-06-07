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

    public function AddTeam($team_name, $img,$description, $memberid)
    {
        $sql = "INSERT INTO `project_fifa`.`tbl_teams` (`id`, `poule_id`, `name`, `img`, `description`, `created_by`, `created_at`, `deleted_at`) VALUES (NULL, NULL , :teamname, :img, :description, :memberid, CURRENT_TIMESTAMP, NULL);";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':teamname' => $team_name, ':img' => $img, ':description' => $description, ':memberid' => $memberid));
    }

    public function DeleteTeamById($team_id)
    {
        $sql = "UPDATE `tbl_teams` SET `deleted_at` = CURRENT_TIMESTAMP WHERE `id` = :id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('id' => $team_id));
    }

    public function DeleteTeamFromPoul($team_id)
    {
        $sql = "UPDATE `tbl_teams` SET `poule_id` = NULL WHERE `id` = $team_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    private function aasort (&$array, $key) {
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

    public function NumberOfTeams()
    {
        return count($this->GetTeams());
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

    private function GetTeamsFromDb()
    {

        $sql        = "SELECT * FROM `tbl_teams` WHERE `deleted_at` IS NULL";
        $teams      = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $arr_teams  = array();

        foreach ($teams as $team)
        {
            $time = $team + $this->GetTeamScoreByTeamId($team['id']);
            array_push($arr_teams, $time);
        }



        return $this->aasort($arr_teams,"score");
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
                } elseif ($match['score_team_a'] == $match['score_team_b'] && $match['score_team_a'] != NULL) {
                    $arr_socre['draw'] += 1;
                }
            }
            elseif ($match['team_id_b'] == $team_id) {
                if ($match['score_team_b'] > $match['score_team_a']) {
                    $arr_socre['win'] += 1;
                }elseif ($match['score_team_b'] < $match['score_team_a']) {
                    $arr_socre['lose'] += 1;
                } elseif ($match['score_team_b'] == $match['score_team_a'] && $match['score_team_b'] != NULL) {
                    $arr_socre['draw'] += 1;
                }
            }
        }

        $arr_socre['score'] += $arr_socre['win'] * 3;
        $arr_socre['score'] += $arr_socre['draw'] * 1;

        return $arr_socre;
    }


    public function SetTeamInPoul($team_id)
    {
        $PoulesCollection = new PoulesCollection($this->db);

        $arr_poules = array();

        foreach ($PoulesCollection->GetPoules() as $poule)
        {
            $arr_poule = array('id' => $poule['id'], 'teamscount' => $PoulesCollection->NumberOfTeamsInPoulById($poule['id']));
            array_push($arr_poules, $arr_poule);
        }
        $min = array_reduce($arr_poules, function($result, $item)
        {

            if (!isset($result))
            {
                $result = $item;
            }
            if ($result['teamscount'] > $item['teamscount'])
            {
                $result = $item;
            }
            return $result;
        });


        $sql = "UPDATE tbl_teams SET `poule_id` = :minn WHERE `id` = :team_iddd";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('minn' => $min['id'], 'team_iddd' => $team_id));
    }

}
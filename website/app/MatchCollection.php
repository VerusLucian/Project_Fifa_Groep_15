<?php

class MatchCollection
{
    private $matchCollection;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_matches` ORDER BY `tbl_matches`.`start_time` ASC;";
        $this->matchCollection = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function MakePoulMatchesByPoulId($poule_id, $start_time, $duration_time)
    {
        $time_start = strtotime($start_time);
        $count = 0;

        $teams = new TeamCollection($this->db);
        $arr_teams = $teams->GetTeamByPuleId($poule_id);
        $arr_teams_id = array();

        foreach ($arr_teams as $team)
        {
            array_push($arr_teams_id, $team['id']);
        }

        $arr_size = sizeof($arr_teams_id) ;

        for ($i = 0; $i <= $arr_size - 1; $i++)
        {
            for ($c = $i+1; $c <= $arr_size - 1; $c++)
            {
                if ($i != $c)
                {
                    if ($count == 0)
                    {
                        $time = $time_start;
                    }
                    else{
                        $time_start = strtotime("+".substr($duration_time, 0, 2)." hour".substr($duration_time,-2)." minutes", $time_start);
                        $time = $time_start;
                    }

                    $time = date('G:i', $time);

                    $sql = "INSERT INTO `project_fifa`.`tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`) VALUES (NULL, '$arr_teams_id[$i]', '$arr_teams_id[$c]', NULL, NULL, '$time');";
                    $this->db->query($sql);
                    $count++;
                }

            }
        }
    }

    public function ScoreUpdate($match_id, $score_a, $score_b, $time)
    {
        $sql = "UPDATE `tbl_matches` SET `score_team_a` = '$score_a', `score_team_b`= '$score_b', `start_time` = '$time' WHERE `id` = '$match_id';";
        $this->Matches = $this->db->query($sql);
    }

    public function GetMatchByPoulId($poule_id)
    {
        $TeamCollection = new TeamCollection($this->db);
        $arr_teams_in_poule = $TeamCollection->GetTeamByPuleId($poule_id);

        $arr_match_collection = array();
        foreach ($arr_teams_in_poule as $team)
        {
            foreach($this->matchCollection as $match)
            {
                if ($match['team_id_a'] == $team['id'] || $match['team_id_b'] == $team['id'] && in_array($match['id'], $arr_match_collection))
                {
                    array_push($arr_match_collection, $match);
                }
            }
        }

        return $arr_match_collection;
    }

    function WinorloeseByTeamId($match, $team_id)
    {

        if ($match['score_team_a'] == $match['score_team_b'])
        {
            return 'draw';
        }
        elseif(($match['team_id_a'] == $team_id && $match['score_team_a'] > $match['score_team_b']) || ($match['team_id_b'] == $team_id && $match['score_team_b'] > $match['score_team_a']))
        {
            return 'win';
        }else
        {
            return 'lose';
        }
    }

    public function GetMatchById($match_id)
    {
        foreach ($this->matchCollection as $match)
        {
            if ($match['id'] == $match_id)
            {
                return $match;
            }
        }
        return NULL;
    }

    public function GetMatchCollection()
    {
        return $this->matchCollection;
    }
    public function  DeleteMatchTeam($match_id)
    {
        $sql = "UPDATE `project_fifa`.`tbl_matches` SET `start_time` = NULL WHERE `tbl_matches`.`id` = :pouleid ;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('pouleid' => $match_id));
    }

    public function MatchCollectionEndedByTeamId($team_id)
    {
        $arr_team_match = array();
        $teams = new TeamCollection($this->db);
        foreach ($this->GetMatchCollection() as $match)
        {
            if (($match['team_id_a'] == $team_id || $match['team_id_b'] == $team_id) && ($match['score_team_a'] != NULL || $match['score_team_b'] != NULL) && $match['start_time'] != NULL)
            {
                $match['team_a'] = $teams->GetTeamById($match['team_id_a'])['name'];
                $match['team_b'] = $teams->GetTeamById($match['team_id_b'])['name'];
                array_push($arr_team_match, $match);
            }
        }
        return $arr_team_match;
    }
}


<?php

class MatchCollection
{
    private $matchCollection;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_matches` ORDER BY `tbl_matches`.`start_time` DESC;";
        $this->matchCollection = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function MakePoulMatchesByPoulId($poule_id)
    {
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
                    $sql = "INSERT INTO `project_fifa`.`tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`) VALUES (NULL, '$arr_teams_id[$i]', '$arr_teams_id[$c]', NULL, NULL, NULL);";
                    $this->db->query($sql);
                }

            }
        }
    }

    public function UpdateMatchTimes($start_time, $duration_time, $poule_id)
    {

        $arr_match_collection = $this->GetMatchByPoulId($poule_id);
        shuffle($arr_match_collection);

        foreach ($arr_match_collection as $match)
        {
            $sql = "UPDATE `project_fifa`.`tbl_matches` SET `start_time` = :timeofmach WHERE `tbl_matches`.`id` = :pouleid ;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array('timeofmach' => $start_time, 'pouleid' => $match['id']));
            
            $start_time += $duration_time;
        }
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

    public function GetMatchCollection()
    {
        return $this->matchCollection;
    }

    public function MatchCollectionEndedByTeamId($team_id)
    {
        $arr_team_match = array();
        $teams = new TeamCollection($this->db);
        foreach ($this->GetMatchCollection() as $match)
        {
            //teamid || teamidb
            if (($match['team_id_a'] == $team_id || $match['team_id_b'] == $team_id) && ($match['score_team_a'] != NULL || $match['score_team_b'] != NULL) && $match['start_time'] != NULL)
            {
                $match['team_a'] = $teams->GetTeamById($match['team_id_a'])['name'];
                $match['team_b'] = $teams->GetTeamById($match['team_id_b'])['name'];
                array_push($arr_team_match, $match);
            }
        }
        return$arr_team_match;
    }
}


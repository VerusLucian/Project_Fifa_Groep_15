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
        return array_slice($teams->GetTeamByPuleId($poul_id), 0, 2);
    }

}
<?php
require_once "db.php";

class Teams
{
    protected $teams;

    public function __construct()
    {
        $sql = "SELECT * FROM `tbl_teams`";
        $this->teams = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetTeamsByPuleID($pule_id)
    {
        $teams = array();

        foreach ($this->teams as $team)
        {
            if ($team['poule_id'] == $pule_id)
            {
                array_push($teams, $team);
            }
        }

        return $teams;
    }

    public function GetTeams()
    {
        return $this->teams;
    }

}
<?php
require_once "db.php";
require_once "Teams.php";
require_once "tests.php";

class Poules
{
    private $poules;
    public $andrzej;


    public function __construct()
    {
        $sql = "SELECT * FROM `tbl_poules`";
        $this->poules = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetPouleByName($poule_name)
    {
        foreach ($this->poules as $poule)
        {
            if ($poule['naam'] == $poule_name)
            {
                $this->andrzej = $poule;
            }
        }
        return $this;
    }

    public function GetListOfTeams()
    {
        $teams = new Teams();
        return $teams->GetTeamsByPuleID($this->andrzej['id']);
    }

    public function GetPuleId()
    {
        return $this->andrzej['id'];
    }

    public function GetPoules()
    {
        return $this->poules;
    }
}
<?php
class PoulesCollection
{
    private $poules;
    public $temp;
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_poules` WHERE `deleted_at` IS NULL";
        $this->poules = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetPouleByName($poule_name)
    {
        foreach ($this->poules as $poule)
        {
            if ($poule['naam'] == $poule_name)
            {
                $this->temp = $poule;
            }
        }
        return $this;
    }

    public function NumberOfTeamsInPoulById($poule_id)
    {
        $teamCollection = new TeamCollection($this->db);
        $arr_teams = $teamCollection->GetTeamByPuleId($poule_id);
        return count($arr_teams);
    }

    public function GetPuleId()
    {
        return $this->temp['id'];
    }

    public function GetPoules()
    {
        return $this->poules;
    }
}
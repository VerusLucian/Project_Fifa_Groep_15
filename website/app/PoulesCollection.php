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
        return count($teamCollection->GetTeamByPuleId($poule_id));
    }

    public function GetPuleId()
    {
        return $this->temp['id'];
    }

    public function GetPoules()
    {
        return $this->poules;
    }

    public function GetPouleById($poule_id)
    {
        foreach ($this->poules as $poule)
        {
            if ($poule['id'] == $poule_id)
            {
                return $poule;
            }
        }
        return NULL;
    }
}
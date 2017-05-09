<?php
class PoulesCollection
{
    private $poules;
    public $temp;
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_poules`";
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

    public function GetLeadTeamsByPoulId()
    {
        $team = new TeamCollection($this->db);

        $team->GetTeams();

        return $team->GetTeams();
    }

    public function TeamCollectionByPoulId()
    {
        $teams = new TeamCollection($this->db);
        return $teams->GetTeamByPuleId($this->temp['id']);
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
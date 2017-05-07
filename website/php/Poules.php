<?php
require_once "db.php";

class Poules
{
    protected $poules;


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
                return $poule;

            }
        }
    }

    public function GetPuleId($poule)
    {
        return $poule['id'];
    }

    public function GetPoules()
    {
        return $this->poules;
    }
}
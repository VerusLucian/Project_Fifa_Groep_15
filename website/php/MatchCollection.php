<?php

class MatchCollection
{
    private $matchCollection;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_matches` ORDER BY `tbl_matches`.`start_time` ASC ";
        $this->matchCollection = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetMatchCollection()
    {
        return $this->matchCollection;
    }
}
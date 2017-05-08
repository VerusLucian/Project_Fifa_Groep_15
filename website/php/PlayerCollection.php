<?php
require_once "Database.php";
class PlayerCollection
{
    protected $players;
    protected $db;

    public function __construct($db)
    {
        $this->db       = $db;
        $sql            = "SELECT * FROM `tbl_players`";
        $this->players  = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetPlayerCollectionByTeamId($team_id)
    {
        $players = array();

        foreach ($this->players as $player)
        {
            if ($player['team_id'] == $team_id)
            {
                array_push($players, $player);
            }
        }
        return $players;
    }

    public function GetPlayerCollection()
    {
        return $this->players;
    }

}
<?php
require_once "db.php";
class Players
{
    protected $players;

    public function __construct()
    {
        $sql            = "SELECT * FROM `tbl_players`";
        $this->players  = connectToDataBase()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetPlayersByTeamId($team_id)
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

    public function GetPlayers()
    {
        return $this->players;
    }

}
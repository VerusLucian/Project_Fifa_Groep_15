<?php
require_once "Database.php";
class PlayerCollection
{
    protected $players;
    protected $db;

    public function __construct($db)
    {
        $this->db       = $db;
        $sql            = "SELECT * FROM `tbl_players` WHERE `deleted_at` IS NULL";
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

    public function isPlayerInTeam($player_id, $team_id)
    {
        $arr_players = $this->GetPlayerCollectionByTeamId($team_id);
        foreach ($arr_players as $player)
        {
            if ($player['id'] == $player_id)
            {
                return true;
            }
        }
        return false;
    }

    public function GetPlayerCollection()
    {
        return $this->players;
    }

    public function AddPlayer($studen_id, $first_name, $last_name, $team_id)
    {
        $sql = "INSERT INTO `tbl_players` (`id`, `student_id`, `team_id`, `first_name`, `last_name`, `created_at`, `deleted_at`) VALUES (NULL, :student_id, :team_id, :first_name, :last_name, CURRENT_TIMESTAMP, NULL);";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('student_id' => $studen_id, 'team_id' => $team_id, 'first_name' => $first_name, 'last_name' => $last_name));
    }

    public function DeletePlayerById($player_id)
    {
        $sql = "UPDATE `tbl_players` SET `deleted_at` = CURRENT_TIMESTAMP WHERE `id` = :id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('id' => $player_id));
    }

    public function DeletePlayersByTeamId($team_id)
    {
        foreach ($this->GetPlayerCollectionByTeamId($team_id) as $plaeyr)
        {
            $this->DeletePlayerById($plaeyr['id']);
        }
    }

    public function NummberOfPlayersByTeamId($team_id)
    {
        return count($this->GetPlayerCollectionByTeamId($team_id));
    }

}
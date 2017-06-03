<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function UserHaveTeam($user_id)
    {
        $sql = "SELECT `id` FROM `tbl_teams` WHERE `created_by` = :user_id AND `deleted_at` IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('user_id' => $user_id));

        if ($stmt->rowCount() == 1)
        {
            $_SESSION['team'] = $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        }
            return false;
    }

    public function IsOwnerOfTeam($team_id, $user_id)
    {
        $user = new User($this->db);
        if ($user->IsUserAdmin())
        {
            return true;
        }

        $sql = "SELECT * FROM `tbl_teams` WHERE `id` = :team_id AND `created_by` = :user_id AND `deleted_at` IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('team_id' => $team_id, 'user_id' => $user_id));

        if ($stmt->rowCount() == 1 )
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function IsUserAdmin()
    {
        if (!isset($_SESSION['user']))
        {
            return false;
        }
        $sql = "SELECT * FROM `tbl_admins` WHERE `id_user` = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('user_id' => $_SESSION['user']['id']));

        if ($stmt->rowCount() == 1)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
<?php
class User
{
    private $db;
    private $UserCollection;

    public function __construct($db)
    {
        $this->db = $db;
        $sql = "SELECT * FROM `tbl_members` WHERE `deleted_at` IS NULL";
        $this->UserCollection = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function UserHaveTeam($user_id)
    {
        $sql = "SELECT `id` FROM `tbl_teams` WHERE `created_by` = :user_id AND `deleted_at` IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('user_id' => $user_id));

        if ($stmt->rowCount() == 1)
        {
            $arr_team = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['team'] =  $arr_team['id'];
            return true;
        }
            return false;
    }

    public function MakeUserAdmin($user_id)
    {
        $sql = "INSERT INTO `project_fifa`.`tbl_admins` (`id`, `id_user`) VALUES (NULL, '$user_id');";
        $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function IsOwnerOfATeam($team_id, $user_id)
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

    public function IsUserAdminById($user_id)
    {
        $sql = "SELECT * FROM `tbl_admins` WHERE `id_user` = '$user_id'";
        $count =  $this->db->query($sql)->rowCount();
        if ($count == 1)
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

    public function GetUserCollection()
    {
        return $this->UserCollection;
    }

    public function GetUserById($user_id)
    {
        foreach ($this->UserCollection as $user)
        {
            if ($user['id'] == $user_id)
            {
                return $user;
            }
        }
        return NULL;
    }
}
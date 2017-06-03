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
        $sql = "SELECT `id` FROM `tbl_teams` WHERE `created_by` = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('user_id' => $user_id));

        if ($stmt->rowCount() == 1)
        {
            $_SESSION['team'] = $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        }
            return false;
    }
}
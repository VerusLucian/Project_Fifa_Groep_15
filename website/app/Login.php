<?php
class Login
{
    private $email;
    private $password;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $this->email = trim(strtolower($email));
        $this->password = md5(trim($password));
        $validateacc = $this->validateacc($this->email, $this->password);

        if ($validateacc != false)
        {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $validateacc;
            return true;
        }
        else{
            session_abort();
            return false;
        }
    }

    private function validateacc($email, $password)
    {
        $sql = "SELECT `id`, `email`, `firstname`, `lastname` FROM `tbl_members` WHERE `email` = :email and `password` = :password and `deleted_at` IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('email' => $email, 'password' => $password));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION ['logged_in'] ) && $_SESSION ['logged_in'] == true)
        {
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
    }

}
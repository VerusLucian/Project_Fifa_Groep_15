<?php

/**
 * Created by PhpStorm.
 * User: minel
 * Date: 03.06.2017
 * Time: 08:42
 */
class Register
{
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $db;


    public function __construct($name, $lastname, $email, $password, $db)
    {
        $this->db = $db;
        $this->name = trim($name);
        $this->lastname = trim($lastname);
        $this->email = trim($email);
        $this->password = trim($password);

    }

    public function Register()
    {
        $sql = "INSERT INTO `project_fifa`.`tbl_members` (`id`, `email`, `password`, `firstname`, `lastname`) VALUES (NULL, :email, :password, :firstname, :lastname);";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('email' => $this->email, 'password' => md5($this->password), 'firstname' => $this->name, 'lastname' => $this->lastname));
    }

    public function CheckOfAcountExist()
    {
        $sql = "SELECT `email` FROM `tbl_members` WHERE `email` = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('email' => $this->email));

        if ($stmt->rowCount() == 1)
        {
            return true;

        }else{

            return false;
        }
    }

}
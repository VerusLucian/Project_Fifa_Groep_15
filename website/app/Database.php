<?php
Class Database{

    protected $db;
    private $host;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

    }

    public function connect()
    {
        if (!$this->db) {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
        }
        return $this->db;
    }

}
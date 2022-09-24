<?php
class Database
{

    public $conn;
    private $host;
    private $user;
    private $password;
    private $db;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "my-to-dos";

        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        if (!$this->conn) {
            trigger_error("db not connected");
        }
    }

    public function connect()
    {
        return $this->conn;
    }
}

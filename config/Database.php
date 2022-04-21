<?php

include "config.php";

class Database
{
    //* DB Params
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;

    //* Connection
    private $conn;


    public function connect()
    {
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        //* Set DSN - Data Source Name
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
        try {
            $this->conn = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            echo "Connection error " . $e->getMessage();
        }
        return $this->conn;
    }
}

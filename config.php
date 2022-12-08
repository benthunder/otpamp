<?php

class Config {

    private $host;
    private $username;
    private $password;
    private $dbname;

    private $connection;

    public function __construct(
        $host = 'localhost:3306',
        $username = 'root',
        $password = '',
        $dbname = 'ampotp'
    ) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    private function initConnection() {
        if (is_null($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            $this->connection->set_charset("utf8");
        }
    }

    public function getConnection() {
        $this->initConnection();
        return $this->connection;
    }


    public function __destruct() {
        $this->connection = null;
    }
}

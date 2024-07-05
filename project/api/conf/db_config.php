<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'db_kab_kota';
    private $username = 'root';
    private $password = '';
    private $connection = null;

    public function connect() {
        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exc) {
            echo $exc->getMessage();
        }
        return $this->connection;
    }
}

?>

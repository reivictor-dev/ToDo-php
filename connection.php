<?php

    class Connection {
        private $serv = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $db = 'aula_php';
    

    public function connect() {
        try {
            $conn = new PDO(
                "mysql:host=$this->serv;dbname=$this->db",
                "$this->user",
                "$this->pass"
            );
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
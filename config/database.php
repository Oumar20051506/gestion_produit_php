<?php
class Database {
    private $host = "localhost";
    private $dbname = "gestion_produit";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function connexion() {
        try {
            $this->conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            die("Erreur connexion : " . $e->getMessage());
        }
    }
}
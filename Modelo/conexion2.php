<?php

class Conexion2
{
    private $host, $user, $pass, $database, $charset, $pdo;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->database = "servialc_db";
        $this->charset = "utf8mb4";

        try {
            $a = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->pdo = new PDO($a, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getBD()
    {
        $this->pdo instanceof PDO;
        return $this->pdo;
    }
}

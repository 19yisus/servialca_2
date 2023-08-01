<?php

class Conexion
{
    private $host, $user, $pass, $database, $charset, $pdo;

    public function __construct()
    {
       $this->host = 'localhost';
        $this->user = 'servialc_servialcau';
        $this->pass = 'HkxNSHF]S17D';
        $this->database = 'servialc_db2';
        $this->charset = 'utf8mb4';
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

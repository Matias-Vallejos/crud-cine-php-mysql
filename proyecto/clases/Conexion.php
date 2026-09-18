<?php
class Conexion{
    public $servidor = "localhost";
    public $usuario = "root";
    public $pass = "";
    public $dbname = "cinephp";

    public function conectar(){
        try {
            $dsn = "mysql:host=$this->servidor;dbname=$this->dbname";
            $opciones=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT=>2];
            $pdo = new PDO($dsn, $this->usuario, $this->pass, $opciones);
            return $pdo;
        } catch (PDOException $e) {
            throw $e;
    }
    }
}
?>
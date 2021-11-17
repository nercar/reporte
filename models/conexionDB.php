<?php

class Database
{
    private $host;
    private $port;
    private $db;
    private $username;
    private $password;
    private $charset;

    function Conectar()
    {
        $db_cfg = require_once 'parametros.php';
        $host=$db_cfg["host"];
        $port=$db_cfg["port"];
        $username=$db_cfg["user"];
        $password=$db_cfg["pass"];
        $db=$db_cfg["database"];
        $charset=$db_cfg["charset"];
        $dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";
        try{
            $conn = new PDO($dsn);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->conexion->exec('SET NAMES ' . $this->charset . '');
        }catch(PDOException $error){
            echo "ERROR: " . $error->getMessage();
        }
        return $conn;
    }
}
?>
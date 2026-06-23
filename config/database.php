<?php

class Database
{
    private $host = "localhost";
    private $dbname = "esehsjg18_inventarioweb";
    private $user = "esehsjg18_hsjg";
    private $password = "cJG+8auIxt1H";

    public function conectar()
    {
        try {

            $conexion = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",
                $this->user,
                $this->password
            );

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conexion;

        } catch(PDOException $e){

            die("Error conexión: ".$e->getMessage());

        }
    }
}
<?php

require_once __DIR__ . '/../config/database.php';

class Conexion
{
    public static function conectar()
    {
        $db = new Database();
        return $db->conectar();
    }
}
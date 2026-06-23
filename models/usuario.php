<?php

require_once "conexion.php";

class Usuario
{

    public static function login($usuario)
    {

        $stmt = Conexion::conectar()->prepare("

            SELECT *
            FROM usuarios
            WHERE usuario = :usuario
            LIMIT 1

        ");

        $stmt->bindParam(
            ":usuario",
            $usuario,
            PDO::PARAM_STR
        );

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}
<?php

require_once "conexion.php";

class Estructura
{

    public static function listar()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT
                e.*,
                a.nombre_area
            FROM estructuras e
            INNER JOIN areas a
                ON e.id_area = a.id_area
            ORDER BY e.nombre_estructura ASC
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function crear($datos)
    {
        $stmt = Conexion::conectar()->prepare("
            INSERT INTO estructuras(
                id_area,
                nombre_estructura,
                descripcion,
                estado
            )
            VALUES(
                :id_area,
                :nombre_estructura,
                :descripcion,
                1
            )
        ");

        $stmt->bindParam(":id_area",$datos["id_area"]);
        $stmt->bindParam(":nombre_estructura",$datos["nombre_estructura"]);
        $stmt->bindParam(":descripcion",$datos["descripcion"]);

        return $stmt->execute();
    }

    public static function obtener($id)
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT *
            FROM estructuras
            WHERE id_estructura = :id
        ");

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar($datos)
    {
        $stmt = Conexion::conectar()->prepare("
            UPDATE estructuras
            SET
                id_area = :id_area,
                nombre_estructura = :nombre_estructura,
                descripcion = :descripcion
            WHERE id_estructura = :id_estructura
        ");

        $stmt->bindParam(":id_estructura",$datos["id_estructura"]);
        $stmt->bindParam(":id_area",$datos["id_area"]);
        $stmt->bindParam(":nombre_estructura",$datos["nombre_estructura"]);
        $stmt->bindParam(":descripcion",$datos["descripcion"]);

        return $stmt->execute();
    }

    public static function cambiarEstado($id,$estado)
    {
        $stmt = Conexion::conectar()->prepare("
            UPDATE estructuras
            SET estado = :estado
            WHERE id_estructura = :id
        ");

        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":estado",$estado);

        return $stmt->execute();
    }

}
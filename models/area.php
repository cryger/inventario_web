<?php

require_once __DIR__ . "/conexion.php";

class Area
{
    public static function listar()
        {
            $stmt = Conexion::conectar()->prepare("
                SELECT *
                FROM areas
                ORDER BY nombre_area desc
            ");
        
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    public static function crear($datos)
        {
            $stmt = Conexion::conectar()->prepare("
                INSERT INTO areas(
                    nombre_area,
                    descripcion,
                    estado
                )
                VALUES(
                    :nombre_area,
                    :descripcion,
                    1
                )
            ");
        
            $stmt->bindParam(":nombre_area",$datos["nombre_area"]);
            $stmt->bindParam(":descripcion",$datos["descripcion"]);
        
            return $stmt->execute();
        }

    public static function obtener($id)
        {
            $stmt = Conexion::conectar()->prepare("
                SELECT *
                FROM areas
                WHERE id_area = :id
            ");
        
            $stmt->bindParam(":id",$id);
        
            $stmt->execute();
        
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    public static function actualizar($datos)
        {
            $stmt = Conexion::conectar()->prepare("
                UPDATE areas
                SET
                    nombre_area = :nombre_area,
                    descripcion = :descripcion
                WHERE id_area = :id_area
            ");
        
            $stmt->bindParam(":id_area",$datos["id_area"]);
            $stmt->bindParam(":nombre_area",$datos["nombre_area"]);
            $stmt->bindParam(":descripcion",$datos["descripcion"]);
        
            return $stmt->execute();
        }

    public static function cambiarEstado($id,$estado)
    {
        $stmt = Conexion::conectar()->prepare("
            UPDATE areas
            SET estado = :estado
            WHERE id = :id
        ");

        $stmt->bindParam(
            ":id",
            $id,
            PDO::PARAM_INT
        );

        $stmt->bindParam(
            ":estado",
            $estado,
            PDO::PARAM_INT
        );

        return $stmt->execute();
    }
}
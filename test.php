<?php

require_once "models/conexion.php";

try{

    $pdo = Conexion::conectar();

    echo "CONEXION OK";

}catch(Exception $e){

    echo $e->getMessage();

}
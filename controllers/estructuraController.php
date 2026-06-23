<?php

session_start();

require_once "../models/estructura.php";

$accion = $_POST["accion"] ?? "";

switch($accion)
{

    case "listar":

        echo json_encode(
            Estructura::listar()
        );

    break;

    case "crear":

        echo json_encode(
            Estructura::crear($_POST)
        );

    break;

    case "obtener":

        echo json_encode(
            Estructura::obtener(
                $_POST["id"]
            )
        );

    break;

    case "actualizar":

        echo json_encode(
            Estructura::actualizar($_POST)
        );

    break;

}
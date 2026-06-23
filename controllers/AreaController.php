<?php

session_start();



header('Content-Type: application/json; charset=utf-8');

require_once "../models/area.php";

$accion = $_POST["accion"] ?? "";

switch($accion)
{
    case "listar":

        echo json_encode(
            Area::listar()
        );

    break;

    case "crear":

        echo json_encode(
            Area::crear($_POST)
        );

    break;

    case "obtener":

        echo json_encode(
            Area::obtener($_POST["id"])
        );

    break;

    case "actualizar":

        echo json_encode(
            Area::actualizar($_POST)
        );

    break;

    default:

        echo json_encode([]);

    break;
}
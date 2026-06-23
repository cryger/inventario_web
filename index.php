<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$ruta = $_GET["ruta"] ?? "login";

switch($ruta){

    case "dashboard":

        require_once "middleware/auth.php";

        require_once "views/dashboard/dashboard.phtml";

    break;
    
    case "usuarios":
        require_once "views/usuarios/usuarios.phtml";
    break;

    case "areas":
        require_once "views/areas/areas.phtml";
    break;

    case "estructuras":
        require_once "views/estructuras/estructuras.phtml";
    break;

    case "publicaciones":
        require_once "views/publicaciones/publicaciones.phtml";
    break;

    case "historial":
        require_once "views/historial/historial.phtml";
    break;

    case "logout":

        $_SESSION = [];

        session_destroy();

        header("Location: index.php");

        exit();

    break;

    default:

        require_once "controllers/LoginController.php";

        LoginController::login();

        require_once "views/login/login.phtml";

}
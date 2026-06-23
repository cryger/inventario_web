<?php

require_once "models/usuario.php";

class LoginController
{

    public static function login()
    {

        if(isset($_POST["usuario"])){

            $usuario = Usuario::login(
                trim($_POST["usuario"])
            );

            if(
                $usuario &&
                password_verify(
                    $_POST["password"],
                    $usuario["password"]
                )
            ){

                $_SESSION["id"] = $usuario["id"];

                $_SESSION["nombre"] = $usuario["nombre"];

                $_SESSION["rol"] = $usuario["rol"];

                header(
                    "Location:index.php?ruta=dashboard"
                );

                exit();

            }

            echo "
            <script>

                alert('Usuario o contrase«Ğa incorrectos');

            </script>
            ";

        }

    }

}
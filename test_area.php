<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "models/area.php";

echo "<h1>INICIO</h1>";

echo "<pre>";
print_r(Area::listar());
echo "</pre>";

echo "<h1>FIN</h1>";
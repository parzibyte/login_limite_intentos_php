<?php
include_once "funciones.php";
if (!usuarioEstaLogueado()) {
    header("Location: formulario_login.php");
    exit;
}

if (!isset($_GET["id"])) {
    exit("Se necesita el parámetro id en la url");
}

$idUsuario = $_GET["id"];
eliminarIntentos($idUsuario);
header("Location: usuarios.php");

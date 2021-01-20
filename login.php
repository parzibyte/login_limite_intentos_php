<?php
# Simple validación
if (!isset($_POST["correo"]) || !isset($_POST["palabraSecreta"])) {
    exit("Faltan datos");
}
$correo = $_POST["correo"];
$palabraSecreta = $_POST["palabraSecreta"];
include_once "funciones.php";
$valor = hacerLogin($correo, $palabraSecreta);
if ($valor == 0) {
    # Correo o contraseña incorrectos
    header("Location: formulario_login.php?mensaje=Usuario o contraseña incorrectos. Se ha registrado el intento fallido");
} else if ($valor == 2) {
    header("Location: formulario_login.php?mensaje=Límite de intentos alcanzado. Contactar a administrador para reiniciar");
} else {
    #Todo bien. Redireccionar a la página
    # TODO: iniciar sesión
    header("Location: protegida.php");
}

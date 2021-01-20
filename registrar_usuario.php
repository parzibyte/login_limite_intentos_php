<?php
if (!isset($_POST["correo"]) || !isset($_POST["palabraSecreta"]) || !isset($_POST["palabraSecretaConfirmar"])) {
    exit("Faltan datos");
}

include_once "funciones.php";
if ($_POST["palabraSecreta"] !== $_POST["palabraSecretaConfirmar"]) {
    header("Location: formulario_registro.php?mensaje=Las contraseñas no coinciden");
    exit;
}
registrarUsuario($_POST["correo"], $_POST["palabraSecreta"]);
header("Location: formulario_login.php?mensaje=Usuario creado. Inicia sesión");

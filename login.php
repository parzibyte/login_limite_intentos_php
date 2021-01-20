<?php
/*

  ____          _____               _ _           _       
 |  _ \        |  __ \             (_) |         | |      
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___ 
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |        
        |___/                               |___/         
    
____________________________________
/ Si necesitas ayuda, contáctame en \
\ https://parzibyte.me               /
 ------------------------------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||
Creado por Parzibyte (https://parzibyte.me).
------------------------------------------------------------------------------------------------
Si el código es útil para ti, puedes agradecerme siguiéndome: https://parzibyte.me/blog/sigueme/
Y compartiendo mi blog con tus amigos
También tengo canal de YouTube: https://www.youtube.com/channel/UCroP4BTWjfM0CkGB6AFUoBg?sub_confirmation=1
------------------------------------------------------------------------------------------------
*/ ?>
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
    #Todo bien. Iniciar sesión y redireccionar a la página
    iniciarSesionDeUsuario();
    header("Location: usuarios.php");
}

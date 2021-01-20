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
include_once "encabezado.php";
include_once "funciones.php";
# Si no hay usuario logueado, salir inmediatamente
if (!usuarioEstaLogueado()) {
    header("Location: formulario_login.php?mensaje=Inicia sesión para acceder a la página protegida");
    exit; // <- Es muy importante terminar el script
}
# Si llegamos aquí, es que el usuario inició sesión anteriormente
$usuarios = obtenerUsuariosConIntentosFallidos();
?>
<div class="col-12">
    <h1>Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Correo</th>
                <th>Intentos fallidos</th>
                <th>Reiniciar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario->correo ?></td>
                    <td><?php echo $usuario->intentos_fallidos ?></td>
                    <td>
                        <a href="reiniciar_conteo.php?id=<?php echo $usuario->id ?>" class="btn btn-danger">Reiniciar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php ?>
</div>
<?php include_once "pie.php"; ?>
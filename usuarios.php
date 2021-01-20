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
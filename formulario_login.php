<?php include_once "encabezado.php" ?>
<div class="col-12">
    <h1>Login</h1>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input class="form-control" id="correo" type="email" name="correo" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
            <label for="palabraSecreta">Contraseña:</label>
            <input class="form-control" id="palabraSecreta" type="password" name="palabraSecreta" required placeholder="Contraseña">
        </div>
        <?php
        # si hay un mensaje, mostrarlo
        if (isset($_GET["mensaje"])) { ?>
            <div class="alert alert-info">
                <?php echo $_GET["mensaje"] ?>
            </div>
        <?php } ?>
        <br>
        <button class="btn btn-success" type="submit">Iniciar sesión</button>
    </form>
</div>
<?php include_once "encabezado.php" ?>
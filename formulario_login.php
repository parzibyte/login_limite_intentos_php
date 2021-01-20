<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <br>
        <br>
        <input type="password" name="palabraSecreta" required placeholder="Contraseña">
        <br>
        <br>
        <?php
        # si hay un mensaje, mostrarlo
        if (isset($_GET["mensaje"])) {
            echo $_GET["mensaje"];
        }
        ?>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>

</html>
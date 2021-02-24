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
<?php include_once "encabezado.php" ?>
<div class="col-12">
    <h1>Registro de usuario</h1>
    <form action="registrar_usuario.php" method="post">
        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input class="form-control" id="correo" type="email" name="correo" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
            <label for="palabraSecreta">Contraseña:</label>
            <input class="form-control" id="palabraSecreta" type="password" name="palabraSecreta" required placeholder="Contraseña">
        </div>
        <div class="form-group">
            <label for="palabraSecretaConfirmar">Confirmar contraseña:</label>
            <input class="form-control" id="palabraSecretaConfirmar" type="password" name="palabraSecretaConfirmar" required placeholder="Confirmar contraseña">
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
<?php include_once "pie.php" ?>
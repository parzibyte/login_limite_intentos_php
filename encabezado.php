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
<!doctype html>
<html lang="es">
<!--
  Plantilla inicial de Bootstrap 4
  @author parzibyte
  Visita: parzibyte.me/blog
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login con límite de intentos en PHP">
    <meta name="author" content="Parzibyte">
    <title>Login con límite de intentos en PHP - By Parzibyte</title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Cargar estilos propios -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <!-- Definición del menú -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" target="_blank" href="//parzibyte.me/blog"><small>Login con límite de intentos en PHP y MySQL</small>&nbsp;By Parzibyte</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miNavbar" aria-controls="miNavbar" aria-expanded="false" aria-label="Mostrar u ocultar menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="formulario_login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formulario_registro.php">Registrar usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" target="_blank" href="https://parzibyte.me/l/fW8zGd">Soporte y ayuda</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- Termina la definición del menú -->
    <main role="main" class="container">
        <div class="row">
<?php
# El número de intentos máximos
define("MAXIMOS_INTENTOS", 2);


function registrarUsuario($correo, $palabraSecreta)
{
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("INSERT INTO usuarios(correo, palabra_secreta) VALUES (?, ?)");
    $sentencia->execute([$correo, $palabraSecreta]);
}

function eliminarIntentos($idUsuario)
{
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("DELETE FROM intentos_usuarios WHERE id_usuario = ?");
    $sentencia->execute([$idUsuario]);
}

/*
Regresa valores numéricos
0 en caso de que el usuario no exista o la contraseña sea incorrecta
1 en caso de que todo esté bien
2 en caso de que haya alcanzado el límite de intentos
*/
function hacerLogin($correo, $palabraSecreta)
{
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("SELECT id, correo, palabra_secreta FROM usuarios WHERE correo = ?");
    $sentencia->execute([$correo]);
    $registro = $sentencia->fetchObject();
    if ($registro == null) {
        # No hay registros que coincidan, y no hay a quién culpar (porque el usuario no existe)
        return 0;
    } else {
        # Sí hay registros, pero no sabemos si ya ha alcanzado el límite de intentos o si la contraseña es correcta
        $conteoIntentosFallidos = obtenerConteoIntentosFallidos($registro->id);
        if ($conteoIntentosFallidos >= MAXIMOS_INTENTOS) {
            # Ha superado el límite
            return 2;
        } else {
            # Extraer la correcta de la base de datos
            $palabraSecretaCorrecta = $registro->palabra_secreta;
            # Comparar con la proporcionada:
            # Nota: esto es por simplicidad, en la vida real debes hashear las contraseñas
            # https://parzibyte.me/blog/2017/11/13/cifrando-comprobando-contrasenas-en-php/
            if (hash_equals($palabraSecretaCorrecta, $palabraSecreta)) {
                # Todo correcto. Borramos todos los intentos, pues ya hizo uno exitoso
                eliminarIntentos($registro->id);
                return 1;
            } else {
                # Agregamos un intento fallido
                agregarIntentoFallido($registro->id);
                return 0;
            }
        }
    }
}

function obtenerConteoIntentosFallidos($idUsuario)
{
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("SELECT COUNT(*) AS conteo FROM intentos_usuarios WHERE id_usuario = ?");
    $sentencia->execute([$idUsuario]);
    $registro = $sentencia->fetchObject();
    $conteo = $registro->conteo;
    return $conteo;
}

function agregarIntentoFallido($idUsuario)
{
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("INSERT INTO intentos_usuarios(id_usuario) VALUES (?)");
    $sentencia->execute([$idUsuario]);
}

function obtenerBaseDeDatos()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}

function obtenerVariableDelEntorno($clave)
{

    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $archivo = "env.php";
        if (!file_exists($archivo)) {
            throw new Exception("El archivo de las variables de entorno ($archivo) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($archivo);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$clave])) {
        return $vars[$clave];
    } else {
        throw new Exception("La clave especificada (" . $clave . ") no existe en el archivo de las variables de entorno");
    }
}

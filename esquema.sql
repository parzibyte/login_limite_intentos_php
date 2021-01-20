CREATE TABLE usuarios(
    id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    correo VARCHAR(255) NOT NULL,
    palabra_secreta VARCHAR(255) NOT NULL
);
/*
Solo necesitamos el id del usuario, vamos a insertar
un valor cada vez que haya un login no exitoso, y 
luego vamos a contar cuántos valores hay
*/
CREATE TABLE intentos_usuarios(
    id_usuario BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE
);
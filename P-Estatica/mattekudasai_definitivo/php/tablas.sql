/* Código sql para crear las tablas necesarias en la base de mattekudasai*/
CREATE TABLE imagen(
    id INT AUTO_INCREMENT PRIMARY KEY,
    dirUrl VARCHAR(255),
    titulo VARCHAR(255),
    alt VARCHAR(255),
    deleted_at DATETIME,
    id_tipo_trabajo INT(2)
);

INSERT INTO imagen(
    id, dirUrl, titulo, alt, deleted_at, id_tipo_trabajo
)
VALUES (

);

CREATE TABLE visita(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    telefono int(11),
    fecha DATE,
    deleted_at DATETIME,
    hora TIME
);

INSERT INTO visita(
    id, nombre, apellido, telefono, fecha, deleted_at, hora
)
VALUES(

);
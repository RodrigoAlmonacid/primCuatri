/* Código sql para crear las tablas necesarias en la base de mattekudasai*/
CREATE TABLE imagenes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    path VARCHAR(255),
    titulo VARCHAR(255),
    alt VARCHAR(255),
    delete_at VARCHAR(255),
    id_tipo_trabajo INT(2)
);
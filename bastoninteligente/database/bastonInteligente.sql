CREATE DATABASE bastonInteligente COLLATE = utf8_unicode_ci;

USE bastonInteligente;


CREATE TABLE modelo_arduino(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(150),
    descripcion VARCHAR(255),
    CONSTRAINT pk_modelo_arduino PRIMARY KEY(id)
)ENGINE=InnoDb;


INSERT INTO modelo_arduino VALUES(NULL, "CH340", "El CH340 es un controlador USB comúnmente utilizado en placas 
Arduino para permitir la conexión y comunicación con dispositivos USB" ); 

CREATE TABLE usuario(
    id  INT(255) AUTO_INCREMENT NOT NULL,
    cod_arduino VARCHAR(150) NOT NULL,
    nombre VARCHAR(255),
    apellido VARCHAR(233),
    edad DATE NOT NULL,
    sexo_us varchar(50) NOT NULL,
    email_us varchar(100) NOT NULL,
    mod_ar_id int(255) NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT uq_cod_arduino_us UNIQUE(cod_arduino),
    CONSTRAINT fk_usuario_modelo_arduino FOREIGN KEY(mod_ar_id) REFERENCES modelo_arduino(id)
)ENGINE=InnoDb;


INSERT INTO usuario VALUES(NULL, "AR-001", "MARTIN", "SANTAMARIA", "2006-09-21", "HOMBRE", "santa@santa.com", 1)

CREATE TABLE recorrido(
    id INT AUTO_INCREMENT NOT NULL,
    latitud DECIMAL(9, 6),
    longitud DECIMAL(9, 6),
    usuario_id int,
    CONSTRAINT pk_id PRIMARY KEY(id),
    CONSTRAINT fk_recorrido_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id)
)ENGINE=InnoDb;



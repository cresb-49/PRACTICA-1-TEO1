CREATE DATABASE maizblog;
use maizblog;

CREATE TABLE usuario(
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    rol VARCHAR(10) NOT NULL
);
CREATE TABLE clasificacion(
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);
CREATE TABLE comentarios(
    id INT NOT NULL PRIMARY KEY,
    contenido TEXT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    usuario VARCHAR(255) NOT NULL,
    clasificacion INT NOT NULL,
    FOREIGN KEY (clasificacion) REFERENCES clasificacion(id),
    FOREIGN KEY (usuario) REFERENCES usuario(username)
);
CREATE TABLE sugerencias(
    id INT NOT NULL PRIMARY KEY,
    contenido TEXT NOT NULL,
    usuario VARCHAR(255) NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuario(username)
);

--Usuarios de inicio del sistema
INSERT INTO usuario VALUES('admin','admin12345','Jose Alberto','ADMIN');
INSERT INTO usuario VALUES('usuario1','pass1234','Juan Pérez','USUARIO');
INSERT INTO usuario VALUES('usuario2','abcd1234','María López','USUARIO');
INSERT INTO usuario VALUES('usuario3','password','Pedro García','USUARIO');
INSERT INTO usuario VALUES('usuario4','secure123','Ana González','USUARIO');
INSERT INTO usuario VALUES('usuario5','qwertyuiop','Luisa Martínez','USUARIO');

--Classificaciones existentes del blog
INSERT INTO clasificacion VALUES(1,'Alimentacion');
INSERT INTO clasificacion VALUES(2,'Energia');
INSERT INTO clasificacion VALUES(3,'Materia Prima');

CREATE DATABASE maizblog;
use maizblog;

CREATE TABLE usuario(
    username VARCHAR(16) PRIMARY KEY,
    password VARCHAR(15) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    rol VARCHAR(10) NOT NULL
);
CREATE TABLE clasificacion(
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contenido TEXT NOT NULL
);
CREATE TABLE comentarios(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(16) NOT NULL,
    fecha VARCHAR(20) NOT NULL,
    clasificacion INT NOT NULL,
    contenido TEXT NOT NULL,
    FOREIGN KEY (clasificacion) REFERENCES clasificacion(id),
    FOREIGN KEY (usuario) REFERENCES usuario(username)
);
CREATE TABLE sugerencias(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(16) NOT NULL,
    fecha VARCHAR(20) NOT NULL,
    contenido TEXT NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuario(username)
);

/*Usuarios de inicio del sistema*/
INSERT INTO usuario VALUES('admin','Admin12345!','admin_001@dominio.com','ADMIN');
INSERT INTO usuario VALUES('usuario1','Pass@1234','usuario1_002@dominio.com','USUARIO');
INSERT INTO usuario VALUES('usuario2','Abcd1234#','usuario2_003@dominio.com','USUARIO');
INSERT INTO usuario VALUES('usuario3','passworD#2','usuario3_004@dominio.com','USUARIO');
INSERT INTO usuario VALUES('usuario4','$ecUre123','usuario4_005@dominio.com','USUARIO');
INSERT INTO usuario VALUES('usuario5','Qwertyui0p%','usuario5_006@dominio.com','USUARIO');

/*Classificaciones existentes del blog*/
INSERT INTO clasificacion VALUES(1,'Alimentacion','');
INSERT INTO clasificacion VALUES(2,'Energia','');
INSERT INTO clasificacion VALUES(3,'Materia Prima','');

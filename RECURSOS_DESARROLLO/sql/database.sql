CREATE DATABASE maizblog;
use maizblog;

CREATE TABLE usuario(
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE comentarios(
    id INT NOT NULL PRIMARY KEY,
    contenido TEXT NOT NULL,
    usuario VARCHAR(255) NOT NULL,
    Foreign Key (usuario) REFERENCES usuario(username)
);

CREATE TABLE sugerencias(
    id INT NOT NULL PRIMARY KEY,
    contenido TEXT NOT NULL,
    usuario VARCHAR(255) NOT NULL,
    Foreign Key (usuario) REFERENCES usuario(username)
);
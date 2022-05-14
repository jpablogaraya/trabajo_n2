CREATE TABLE usuarios (
idusuario SMALLINT NOT NULL AUTO_INCREMENT,
email VARCHAR(100) NOT NULL, 
nombre VARCHAR(20) NOT NULL, 
apellido VARCHAR(20) NOT NULL, 
contrasena VARCHAR(150) NOT NULL,
activo TINYINT NOT NULL DEFAULT 1,  
PRIMARY KEY (idusuario) 
);
usuariosusuarios
CREATE TABLE clasificaciones (
idclasificacion TINYINT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(50),
PRIMARY KEY (idclasificacion)
);

INSERT INTO clasificaciones (idclasificacion, nombre) VALUES (1,'Noticias');
INSERT INTO clasificaciones (nombre) VALUES ('Asociación');
INSERT INTO clasificaciones (nombre) VALUES ('Información');
INSERT INTO clasificaciones (nombre) VALUES ('Otros');

CREATE TABLE contenidos (
idcontenido MEDIUMINT NOT NULL AUTO_INCREMENT, 
idclasificacion TINYINT NOT NULL,
autor_idusuario SMALLINT NOT NULL,
imagen VARCHAR(255) NOT NULL, 
titulo VARCHAR(200) NOT NULL, 
subtitulo MEDIUMTEXT NOT NULL, 
contenido TEXT NOT NULL, 
PRIMARY KEY (idcontenido), 
FOREIGN KEY (idclasificacion) REFERENCES clasificaciones(idclasificacion),
FOREIGN KEY (autor_idusuario) REFERENCES usuarios(idusuario)
);

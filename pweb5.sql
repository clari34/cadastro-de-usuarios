create database pweb5;
use pweb5;
CREATE TABLE usuario1(
  nome_usuario VARCHAR(100) NULL,
  nome_completo VARCHAR(100) NULL,
  email VARCHAR(11)  NULL,
  senha VARCHAR(11) NOT NULL,
  PRIMARY KEY (`nome_usuario`)
); 
select*from usuario;
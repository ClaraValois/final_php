-- Em produção.

create schema novo;
use novo;

create table categorias(
id_categoria integer auto_increment key
);

create table usuarios(
id_user integer auto_increment key,
nome_user varchar (30),
senha varchar(10),
cpf varchar (15), 
email_user varchar (120),
telefone varchar (11),
nivel varchar (15));



 
 select * from usuarios;
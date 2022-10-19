-- Em produção.

create schema novo;
use novo;

create table categorias(
  id_categoria integer auto_increment key,
  descricao varchar(30)
);

insert into categorias(descricao) values("Escritório");
insert into categorias(descricao) values("Laboratório");
insert into categorias(descricao) values("Informática");

create table marca(
  id_marca integer auto_increment key,
  descricao varchar(50)
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
create schema novo;
use novo;

 create table area_depar(
id_area integer auto_increment primary key,
depar varchar (40)
 );
 
create table categorias(
id_categoria integer auto_increment key
);

create table usuarios(
id_user integer auto_increment key,
nome_user varchar (30),
senha varchar(10),
cpf varchar (15) unique, 
email_user varchar (120),
telefone varchar (11),
nivel varchar (15));

CREATE TABLE servidor ( 
 id_servidor integer auto_increment primary key,
 nome varchar(40),  
 cpf varchar (15), 
 telefone varchar (11),  
 email varchar (80),  
 senha varchar (8),
id_area integer not null,
nivel varchar (15),
foreign key (id_area)  references area_depar (id_area)); 

 
 select * from usuarios;
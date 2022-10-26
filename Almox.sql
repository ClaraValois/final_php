create schema almox;
use almox;

create table produtoteste(
nome_prod varchar (50)
);

 create table area_depar(
id_area integer auto_increment primary key,
depar varchar (40)
 );
 
create table usuarios(
id_user integer auto_increment key,
nome_user varchar (30),
senha varchar(10),
cpf varchar (15) unique, 
email_user varchar (120),
telefone varchar (16),
nivel integer);


insert into usuarios (id_user, nome_user, senha, cpf, email_user, telefone, nivel)
 values(NULL,'Maria', '12345678', '255', 'clara@gmail', '12345', '1' );

select * from usuarios;
CREATE TABLE servidor ( 
 id_servidor integer auto_increment primary key,
 nome varchar(40),  
 cpf varchar (15), 
 telefone varchar (16),  
 email varchar (80),  
 senha varchar (8),
id_area integer not null,

foreign key (id_area)  references area_depar (id_area)); 

create table categorias(
  id_categoria integer auto_increment key,
  descricao varchar(30)
);

insert into categorias(descricao) values("Escritório");
insert into categorias(descricao) values("Laboratório");
insert into categorias(descricao) values("Informática");

CREATE TABLE modelo ( 
 id_modelo integer auto_increment primary key,  
 descricao_mod varchar(30)); 

CREATE TABLE marca( 
 descricao_marca  integer,  
 id_marca integer auto_increment primary key); 
 
 CREATE TABLE valorProduto ( 
 id_valor integer auto_increment primary key,
 lote integer,  
 valorLote float); 

CREATE TABLE tipoProduto 
(  id_tipo integer auto_increment primary key,  
 descricao_tipo varchar (30)); 
 
create table produto( id_prod INT auto_increment KEY,  
 quantDisp integer,  
 nome_prod varchar(30),  
 datacaworptura date,
 hora_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 id_marca integer not null,  
 id_modelo integer not null,  
 id_valor integer not null,
 id_tipo integer not null,
 id_categoria integer not null,
 id_user integer not null,
 
 foreign key  (id_user ) references usuarios (id_user),
 foreign key  (id_categoria ) references categorias (id_categoria),
foreign key  (id_marca ) references marca(id_marca ),
 foreign key  (id_modelo) references modelo (id_modelo),
 foreign key  (id_valor) references valorProduto(id_valor),
foreign key  ( id_tipo) references tipoProduto( id_tipo)

); 

CREATE TABLE requisicao( 
 stats varchar(10),  
 id_req integer auto_increment primary key, 
 dataReq date,  
 
 id_user integer not null,
 id_prod integer not null, 
 valorT float,
 
foreign key (id_user) references usuarios (id_user),
foreign key (id_prod) references produto (id_prod)
); 

CREATE TABLE itemreq ( 
 quantsol integer not null,  
 id_req integer not null,  
 id_prod integer not null, 
 foreign key (id_req) references requisicao (id_req),
 foreign key (id_prod) references produto( id_prod)
); 

CREATE TABLE notafiscal
( 
 id_nf integer auto_increment primary key,
 num_serie integer,  
 fornecedor varchar(25),  
 CNPJ integer  
); 

CREATE TABLE entrada ( 
 qtd integer,  
 id_entrada integer auto_increment primary key,
 id_prod integer not null,  
 id_nf integer not null,
 foreign key (id_nf) references notafiscal (id_nf),
 foreign key (id_prod) references produto (id_prod)
 ); 

select * from usuarios;
 

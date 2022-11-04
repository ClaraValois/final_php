#drop schema almox;
create schema almox;
use almox;

create table marca(
  id_marca integer auto_increment key,
  descricao varchar(30)
);

insert into marca(descricao) values("Bic");
insert into marca(descricao) values("Gigabyte");
insert into marca(descricao) values("Veja");
insert into marca(descricao) values("Positivo");
insert into marca(descricao) values("Faber Castell");
insert into marca(descricao) values("Tilibra");
insert into marca(descricao) values("Leo Leo");
insert into marca(descricao) values("Ipê");
insert into marca(descricao) values("Azulim");
insert into marca(descricao) values("Qboa");
insert into marca(descricao) values("Minuano");
insert into marca(descricao) values("Tixan");
insert into marca(descricao) values("Intel");
insert into marca(descricao) values("Dell");
insert into marca(descricao) values("Acer");
insert into marca(descricao) values("Pichau");

create table categorias(
  id_categoria integer auto_increment key,
  descricao varchar(30)
);

insert into categorias(descricao) values("Escritório");
insert into categorias(descricao) values("Laboratório");
insert into categorias(descricao) values("Informática");
insert into categorias(descricao) values("Limpeza");

select * from categorias;
select * from marca;

create table disponibilidade(
  id_disponibilidade integer auto_increment primary key,
  descricao varchar(15)
);

insert into disponibilidade(descricao) values("Disponível");
insert into disponibilidade(descricao) values("Indisponível");
insert into disponibilidade(descricao) values("Em espera");

create table produtoteste(
  nome_prod varchar (50),
  quantDisp integer,  
  id_categoria integer not null,
  id_disponibilidade integer not null,
  datacaworptura date,
  hora_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  id_marca integer not null,  
  modeloProduto varchar(50),  
  precoProduto double,
  
  id_prod integer auto_increment primary key,
  
  foreign key (id_categoria) references categorias (id_categoria),
  foreign key (id_disponibilidade) references disponibilidade (id_disponibilidade)
);

insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Detergente', 21, 4, 1, 11, 'Coco');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Teclado', 0, 3, 1, 14, 'RGB');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Caneta', 75, 1, 1, 7, 'Azul Bico Fino');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Caderno', 42, 1, 1, 6, 'Brochurão');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Azulim', 0, 4, 2, 9, 'Limpa Tudo');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Monitor', 3, 3, 1, 14, 'HD 60hz');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Processador', 21, 3, 1, 13, 'i3-7007u');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('Memória RAM', 11, 3, 1, 15, '2666mhz');
insert into produtoteste(nome_prod, quantDisp, id_categoria, id_disponibilidade, id_marca, modeloProduto) value ('HD Interno', 53, 3, 1, 15, '1TB');


create table area_depar(
	id_area integer auto_increment primary key,
	depar varchar (40) 
);

insert into area_depar (depar) values ('DEPAD'),('DEPEN'),('CONSUP'),('DETEC');
 SELECT * FROM area_depar;


create table usuarios(
id_user integer auto_increment key,
nome_user varchar (30),
senha varchar(10),
cpf varchar (15) unique, 
email_user varchar (120),
telefone varchar (16),
nivel integer, 
id_area integer not null,
 foreign key (id_area) references area_depar (id_area)
);

insert into usuarios (id_user, nome_user, senha, cpf, email_user, telefone, nivel, id_area )
 values(NULL,'Maria Clara', '12345678', '123.456.789-00', 'clara@gmail', '(77) 9 1234-5678', '1', '3' );
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Kauê Henrick William de Jesus Weber', 'flamengo1234', '105.669.505-69', 'palmeiraseuteamo@outlook.com', '(77) 9 9804-9942', 1, 4);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Pedro Lima', 'hungria213', '421.467.228-45', 'limasii24@gmail.com', '(77) 9 9969-7714', 0, 2);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('George Castro', 'george123', '331.427.534-12', 'castroo23@gmail.com', '(77) 9 9884-3222', 0, 2);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Georgian de Arrascaeta', 'flamengo1234', '047.014.014-67', 'dearrasca@gmail.com', '(77) 9 9969-0014', 1, 2);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('German Cano', 'fluzaocampeao', '111.426.555-14', 'canobrocador@hotmail.com', '(77) 9 9194-4222', 0, 3);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Hernanes Luiz', 'luiz123123', '561.782.365-10', 'hernanesss@outlook.com', '(75) 9924-4311', 0, 2);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Leila Pereira', 'crefisa123', '422.335.553-43', 'verdaocref@gmail.com', '(31) 9 9421-2223', 0, 4);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Eduardo Haaland', 'manchester123', '144.433.124-55', 'cityty@gmail.com', '(78) 9 9433-2323', 0, 1);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Ricardo Sena', 'seninha123', '883.4222.111-42', 'seninharicardo@gmail.com', '(75) 9 9923-4244', 0, 4);
insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('Joana D\'Arc', 'franca1899', '443.115.866-34', 'joaaana@hotmail.com', '(88) 9 9431-2323', 0, 1);
#insert into usuarios(nome_user, senha, cpf, email_user, telefone, nivel, id_area) value ('cocorico', '123456789', '000.000.000-00', 'cocorico@hotmail.com', '(88) 9 9431-2323', 0, 1);

select *from usuarios;

CREATE TABLE modelo ( 
 id_modelo integer auto_increment primary key,  
 descricao_mod varchar(30)); 
 
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

create database dbContatos;

use dbContatos;

create table usuarios (
id int not null,
nome varchar(50) not null , 
senha varchar(50) not null,
constraint pk_contato primary key (id)
);


create table contatos (
nome varchar(50) not null primary key, 
apelido varchar(20) not null, 
telephone char(10),
celular char(10), 
email varchar(30), 
dt_nasc date,
idUsuario int not null, 
foreign key (idUsuario) references usuarios(id));

insert into usuarios values (1, 'manuela', '123456');

insert into usuarios values (2, 'fernando', '654321');
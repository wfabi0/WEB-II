drop database if exists model_test;

create database model_test;

use model_test;

create TABLE alunos (
    id integer AUTO_INCREMENT PRIMARY key,
    nome_alu varchar (50) not null,
    nota_alu numeric(5,2) not null
);


insert into alunos (nome_alu, nota_alu) values ('Fernando', 100);
insert into alunos (nome_alu, nota_alu) values ('Ana', 99);
insert into alunos (nome_alu, nota_alu) values ('Paula', 98);
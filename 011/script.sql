drop database if exists model_test;

create database model_test;

use model_test;

create TABLE alunos (
    id integer AUTO_INCREMENT PRIMARY key,
    nome_alu varchar (50) not null,
    nota_alu numeric(5,2) not null,
    cpf_alu char(11),
    created_at datetime,
    updated_at datetime
);
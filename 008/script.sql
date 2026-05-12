create table alunos (
	id integer auto_increment primary key,
    nome_alu varchar(50) not null,
    nota_alu numeric (5,2) not null
);

insert into alunos (nome_alu, nota_alu) values ('Gabriel', 99);
insert into alunos (nome_alu, nota_alu) values ('Yasmim', 98);
insert into alunos (nome_alu, nota_alu) values ('Felipe', 97);
insert into alunos (nome_alu, nota_alu) values ('Rafael', 96);
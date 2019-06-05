CREATE DATABASE empresa;
USE empresa;

CREATE TABLE funcionarios(
	id_funcionarios int not null auto_increment primary key,
    nome_funcionario varchar(60),
    sexo char(1),
    data_nasc varchar(13),
    observacoes text,
    id_setor int not null,
    FOREIGN KEY (id_setor) REFERENCES setores(id_setores));
    
CREATE TABLE setores(
	id_setores int not null auto_increment primary key,
    nome_setor varchar(60));
    


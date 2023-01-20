#criação do banco de dados
CREATE database SKYSOLAR CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;
USE SKYSOLAR;

#criação da tabela usuários
create table usuarios(
	id int unsigned not null auto_increment,
    nome_completo varchar(100) not null,
	rg varchar(20), 
    cpf varchar(20),
	dt_nascimento date,
    primary key(id)
);

#criação da tabela endereços
create table enderecos(
	id int unsigned not null auto_increment,
    cep varchar(20),
	logradouro varchar(200),
	bairro varchar(200),
	cidade varchar(200),
	estado varchar(200),
	usuario_id int unsigned not null,
    primary key(id),
	constraint fk_enderecos_usuario_usuario_id
		foreign key(usuario_id) references usuarios(id)
);

#inserção de usuários
insert into usuarios(nome_completo, rg, cpf, dt_nascimento) 
values('Emerson Souza','15111355','85898556', '1982-01-07');

#inserção de enderecos
insert into enderecos(usuario_id, cep, logradouro, bairro, cidade, estado) 
values(1, '69028347','Rua Ademar de Barros, 20 - Sta Cruz','Flores', 'Manaus', 'AM');

INSERT INTO enderecos VALUES( null, :cep, :logradouro, :bairro, :cidade, :estado, :usuario_id );

insert into enderecos(usuario_id, cep, logradouro, bairro, cidade, estado) 
values(2, '69028347','Rua Ademar de Barros, 20-B - Sta Cruz','Flores', 'Manaus', 'AM');

#listagem de usuários
select * 
from usuarios;

#listagem de endereços
select * 
from enderecos;

#seleção de endereços relacionados a um usuário
SELECT
	u.nome_completo,
    u.rg,
    u.cpf,
    u.dt_nascimento,
    e.cep as cep,
    e.logradouro as logradouro,
    e.cidade as cidade,
    e.estado as estado,
    e.usuario_id as usuario
FROM usuarios as u
INNER JOIN enderecos as e on e.usuario_id = u.id
WHERE
	usuario_id = '121';

#atualizando dados da tabela
UPDATE enderecos
SET 
	usuario_id = 1
WHERE
	id = 2 AND
    usuario_id = 2;

#inserindo e listando novos registros

insert into usuarios(nome_completo, rg, cpf, dt_nascimento) 
values('Maria José','1211353','33898354', '1993-02-17');

insert into usuarios(nome_completo, rg, cpf, dt_nascimento) 
values('Paulo Lima','3211353','33898352', '1956-02-17');

select * 
from usuarios;

select * 
from enderecos;

#Exclusão de registros
DELETE FROM usuarios
WHERE id = 3 OR id = 4;

SELECT cep, logradouro, usuario_id FROM enderecos GROUP BY usuario_id;






SELECT
		u.nome_completo,
		u.rg,
		u.cpf,
		u.dt_nascimento,
		e.id as endereco_
		e.cep as cep,
		e.logradouro as logradouro,
		e.cidade as cidade,
		e.estado as estado,
		e.usuario_id as usuario_id
	FROM usuarios as u
	LEFT JOIN enderecos as e on e.usuario_id = u.id
	WHERE
		u.id = 161;
        
	
UPDATE usuarios SET 
		nome_completo = 'Paulo Gama',
		rg = '44444556',
		cpf = '447844574',
		dt_nascimento = '1960-05-01' WHERE id=161;
        
UPDATE enderecos SET
    cep = '695555', 
    logradouro = 'Rua 2, 15 - Sta Cruz',
    bairro = 'Flores',
    cidade = 'Rio de Janeiro', 
    estado = 'RJ' WHERE id = 42;
    
    
SELECT
	nome_completo,
	rg,
	cpf,
	dt_nascimento
	FROM usuarios WHERE
	nome_completo like '%Emerson%';
                
select * from usuarios where id = 161;
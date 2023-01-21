#criação do banco de dados
# Criação da base de dados 
CREATE database SKYSOLAR CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;

# selecionar db skysolar 
USE SKYSOLAR;

# Criação da tabela usuarios
CREATE TABLE usuarios(
	id int unsigned not null auto_increment,
    nome_completo varchar(100) not null,
	rg varchar(20), 
    cpf varchar(20),
	dt_nascimento date,
    primary key(id)
);

# Criação da tabela enderecos fazendo referência à enderecos
CREATE TABLE enderecos(
	id int unsigned not null auto_increment,
    cep varchar(20),
	logradouro varchar(200),
	bairro varchar(200),
	cidade varchar(200),
	estado varchar(200),
	usuario_id int unsigned not null,
    primary key(id),
	CONSTRAINT fk_enderecos_usuario_usuario_id
		FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
		ON DELETE CASCADE
);

# INSERÇÃO DE USUÁRIOS
INSERT INTO usuarios(nome_completo, rg, cpf, dt_nascimento) 
VALUE('Emerson Souza','155544447','85888788956', '1982-01-07');
INSERT INTO usuarios(nome_completo, rg, cpf, dt_nascimento) 
VALUE('Maria Souza','166644448','99888977958', '1960-04-01');
INSERT INTO usuarios(nome_completo, rg, cpf, dt_nascimento) 
VALUE('Welleson Gama','54445555','55888997854', '1992-03-15');
INSERT INTO usuarios(nome_completo, rg, cpf, dt_nascimento) 
VALUE('Paulo Gama','58888788','65444554888', '1950-11-10');
INSERT INTO usuarios(nome_completo, rg, cpf, dt_nascimento) 
VALUE('Emilly Araújo','15111444','55588597858', '2008-11-15');

# Listando usuários
SELECT * FROM usuarios;

#INSERÇÃO DE ENDEREÇOS
#Usuário possui 2 endereços
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69028347','Rua Ademar de Barros, 20 - Sta Cruz','Flores', 'Manaus', 'AM', 1);
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69028320','Rua 1, 12','Compensa', 'Manaus', 'AM', 1);

INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua 3, 12','São José', 'Manaus', 'AM', 2);
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua 7, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 2);

INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 3);
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 3);

INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 4);
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 4);

INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 5);
INSERT INTO enderecos(cep, logradouro, bairro, cidade, estado, usuario_id) 
VALUES('69000000','Rua Barão de Indaiá, 124-A','Pq das Laranjeiras', 'Manaus', 'AM', 5);

#Lista de endereços
SELECT * 
FROM enderecos;


#Lista de enderecos por usuário
SELECT
	e.id,
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
	usuario_id = '1';

#ATUALIZAÇÃO DE REGISTROS
#Atualização de endereco por usuário específico
UPDATE enderecos
SET 
	cep = '69111333'
WHERE
	id = 2 AND
    usuario_id = 1;

#Listando endereço alterado
SELECT * FROM enderecos WHERE usuario_id = 1 AND id = 2;

#Atualizando usuarios
UPDATE usuarios SET 
		nome_completo = 'Paulo Gama',
		rg = '44444556',
		cpf = '447844574',
		dt_nascimento = '1960-05-01' WHERE id=161;

#Atualizando enderecos
UPDATE enderecos SET
    cep = '695555', 
    logradouro = 'Rua 2, 15 - Sta Cruz',
    bairro = 'Flores',
    cidade = 'Rio de Janeiro', 
    estado = 'RJ' WHERE id = 42;
    
#Excluir usuário
DELETE FROM usuarios
WHERE id = 1;      

#Selecionando usuário específico - search
SELECT
	nome_completo,
	rg,
	cpf,
	dt_nascimento
	FROM usuarios WHERE
	nome_completo like '%Emerson%';
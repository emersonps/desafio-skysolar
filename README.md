REQUISITOS MÍNIMOS:
- PHP 8
- MySQL 8
- Composer 2.5

CONFIGURANDO O AMBIENTE PARA RODAR O PROJETO

1. Clone o projeto para seu local
2. Na raiz do projeto, digite o comando: composer update
3. No seu gerenciador de banco de dados execute os comandos que estão listados no arquivo
comandos.sql, na pasta db_comandos na raiz do projeto.
4. Com a base pronta, configure o arquivo de conexão para o usuário, senha e porta da sua conexão com o banco local, no 
arquivo: DAO\MySql\Skysolar\Conexao.php.
5. Dica: No arquivo de configuração do php: php.ini, descomente a linha onde se encontra o seguinte:
	Antes:
	;extension=pdo_mysql

	Depois:
	extension=pdo_mysql
6. No mesmo arquivo (php.ini), deixe em off a seguinte linha (caso a tela exiba mensagens de erro do php):
display_errors = off;
7. Com tudo configurado, agora rode o sistema com o seguinte comando (na raiz do projeto):
php -S localhost:8080 -t public





# Desafio Programador Sky Solar

Este desafio consiste no desenvolvimento de um pequeno sistema para demonstrar seus conhecimentos na linguagem PHP.

Realize um fork deste projeto em seu github e desenvolva o projeto utilizando o [Gitflow](https://www.atlassian.com/br/git/tutorials/comparing-workflows/gitflow-workflow) para estruturar seu projeto com branchs main, develop e features para organizar melhor o fluxo de desenvolvimento do sistema.

Requisitos:
- Será necessário desenvolver duas aplicações em linguagem PHP sendo um voltada ao frontend e outra ao backend.
- Utilizar um design responsivo nas telas de frontend com o bootstrap.
- Será verificado também o uso do git, tanto na montagem das branchs como nas descrições dos commits.
- Criar um arquivo de markdown (.md) descrevendo o processo de instalação e configuração das duas aplicações.
- Incluir arquivo de documentação (swagger, openapi, postman) com as requisições executadas.

## Aplicação 01 - Backend

- A aplicação precisa ser estruturada como se fosse uma API recebendo as reguisições HTTP POST/GET/PUT/DELETE.
- Os dados recebidos e enviados desta API precisarão ser em formato JSON.  
- A aplicação precisará inserir os dados em uma tabela de pessoa e endereços no banco de dados MySql.
- Será possível cadastrar N endereços para esta pessoa.
- Criar uma pasta com os scripts de criação do banco de dados.
- A API precisará ser protegida por um bearer token.

### Dados da Pessoa
- Nome completo
- RG, CPF
- Data de nascimento
- Endereço Principal e Secundário
  - CEP
  - Logradouro completo
  - Bairro
  - Cidade
  - Estado

### Status das requisições
- 200 - OK
- 401 - Não autenticado
- 400 - Erro tratado pela aplicação
- 404 - Rota não encontrada
- 500 - Erro não previsto

Com relação aos frameworks, utilizar:
- [Koseven](https://github.com/koseven/koseven)
- ou [Slim Framework](https://www.slimframework.com/)

## Aplicação 02 - Frontend

A aplicação precisa fazer requisições na api desenvolvida de backend com as seguintes telas:
- Listagem de pessoas cadastradas com opção para alterar e remover a pessoa cadastrada
- Formulário de cadastro de pessoa
- Formulário de alteração de pessoa
- Opção para excluir uma pessoa
- Tela responsiva

Com relação aos frameworks, utilizar:
- [Bootstrap versão 4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [Jquery versão 3](https://jquery.com/download/)

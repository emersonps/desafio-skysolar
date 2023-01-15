Para executar alterações no projeto é necessário ter instalado e configurado em sua máquina:
Composer (gerenciador de pacotes php)
Git (comandos de atualizações no repositório)
PHP8 (linguagem principal)
MySQL8 (Base de dados)
Visual Studio (IDE para codificação)
Insomnia (Para teste de API)

1. Clone o projeto na unidade c: (opcional)
2. Abra o cmd (prompt de comando do windows)
3. Execute o seguinte comando: cd c:\desafio-skysolar <enter>
4. Execute o comando composer install
5. Execute o comando para rodar o php -S localhost:8080 -t backend backend/index.php 
6. Acesso localhost:8080 pelo navegador de sua preferência 
7. Rode os comandos SQL do arquivo: desafio-skysolar/backend/db/comandos.sql, com o SGDB MySql
8. Abra o INSOMNIA e teste as rotas ou teste pelo navegador:
para cada verbo utilize /usuario
  Exemplo:  GET: localhost:8080/usuario
            POST: localhost:8080/usuario



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

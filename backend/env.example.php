<?php
putenv('DISPLAY_ERRORS_DETAILS=' . false);

// Conexão com o Banco de Dados
$host = '';
$dbname = '';
$user = '';
$pass = ''; 
$port = '3306'; //ver configuração da porta definida no gerenciador de banco de dados

putenv('SKYSOLAR_MYSQL_HOST='.$host);
putenv('SKYSOLAR_MYSQL_DBNAME='.$bdname);
putenv('SKYSOLAR_MYSQL_USER='.$user);
putenv('SKYSOLAR_MYSQL_PASSWORD='.$pass);
putenv('SKYSOLAR_MYSQL_PORT='.$port);


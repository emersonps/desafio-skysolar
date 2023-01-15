<?php 

use function src\slimConfiguration;
use App\Controllers\UsuarioController;
use App\Controllers\EnderecoController;

$app = new \Slim\App(slimConfiguration());

//Rotas Usuário
$app->get('/usuario', UsuarioController::class . ':getUsuarios');
$app->post('/usuario', UsuarioController::class . ':insertUsuario');
$app->put('/usuario', UsuarioController::class . ':updateUsuario');
$app->delete('/usuario', UsuarioController::class . ':deleteUsuario');

//Rotas Endereço
$app->get('/endereco', EnderecoController::class . ':getEnderecos');
$app->post('/endereco', EnderecoController::class . ':insertEndereco');
$app->put('/endereco', EnderecoController::class . ':updateEndereco');
$app->delete('/endereco', EnderecoController::class . ':deleteEndereco');

$app->run();
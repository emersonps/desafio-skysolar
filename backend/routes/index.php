<?php 

use function src\slimConfiguration;
use App\Controllers\UsuarioController;
use App\Controllers\EnderecoController;
use App\Controllers\ExceptionController;

$app = new \Slim\App(slimConfiguration());

//Versionamento de API
$app->group('/v1', function () use ($app) {
    $app->get('/test-with-versions', function () {
        return "oi v1";});
});

$app->group('/v2', function () use ($app) {
    $app->get('/test-with-versions', function () {
        return "oi v2";});
});

//Rota de teste de exceptions
$app->get('/exception-test', ExceptionController::class . ':test');

//Rotas Usuário
$app->get('/usuario', UsuarioController::class . ':getUsuarios');
$app->get('/usuario/{id}', UsuarioController::class . ':getUsuario');
$app->post('/usuario', UsuarioController::class . ':insertUsuario');
$app->put('/usuario/{id}', UsuarioController::class . ':updateUsuario');
$app->delete('/usuario/{id}', UsuarioController::class . ':deleteUsuario');

//Rotas Endereço
$app->get('/endereco', EnderecoController::class . ':getEnderecos');
$app->post('/endereco', EnderecoController::class . ':insertEndereco');
$app->put('/endereco', EnderecoController::class . ':updateEndereco');
$app->delete('/endereco', EnderecoController::class . ':deleteEndereco');

$app->run();
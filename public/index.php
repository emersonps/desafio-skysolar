<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

//Versionamento de API
$app->group('/v1', function () use ($app) {
    $app->get('/home', function () {
        return "oi v1";});
});

$app->get('/', 'app\controllers\HomeController:index');

$app->group('/usuario', function () use ($app) {
    $app->get('/novo', 'app\controllers\UsuariosController:getCreateForm');
    $app->post('/novo', 'app\controllers\UsuariosController:getCreate');
    $app->get('/visualizar/{id}', 'app\controllers\UsuariosController:getView');
    $app->get('/list', 'app\controllers\UsuariosController:getList');
    $app->put('/update/{id}', 'app\controllers\UsuariosController:getUpdate');
    $app->get('/delete/{id}', 'app\controllers\UsuariosController:getDelete');
});

$app->group('/endereco', function () use ($app) {
    $app->get('/novo', 'app\controllers\EnderecoController:getCreateForm');
});




$app->get('/user/{id}', 'app\controllers\HomeController:show');
$app->get('/about', 'app\controllers\AboutController:index');
$app->get('/users', 'app\controllers\UsersController:index');
$app->post('/user/subscribe', 'app\controllers\SubscribeController:store');

$app->run();
<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

//Versionamento de API
$app->group('/v1', function () use ($app) {
    $app->get('/', 'app\controllers\HomeController:show');
    $app->post('/', 'app\controllers\AboutController:index');
    $app->put('/', 'app\controllers\UsersController:index');
    $app->delete('/', 'app\controllers\SubscribeController:store');
});

$app->get('/', 'app\controllers\HomeController:index');
$app->get('/about', 'app\controllers\HomeController:about');

$app->group('/usuario', function () use ($app) {
    $app->get('/novo', 'app\controllers\UsuariosController:getCreateForm');
    $app->post('/novo', 'app\controllers\UsuariosController:getCreate');
    $app->get('/visualizar/{id}', 'app\controllers\UsuariosController:getView');
    $app->get('/list', 'app\controllers\UsuariosController:getList');
    $app->put('/alterar/{id}', 'app\controllers\UsuariosController:getUpdate');
    $app->get('/delete/{id}', 'app\controllers\UsuariosController:getDelete');
});

$app->run();
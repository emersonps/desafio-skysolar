<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

//Versionamento de API
$app->group('/v1', function () use ($app) {
    /** Rota listar usuários */
    $app->get('/user', 'app\controllers\ApiController:getAll');
    $app->get('/user/{id}', 'app\controllers\ApiController:getUser');
    $app->post('/user', 'app\controllers\ApiController:getCreate');
    $app->put('/user/{id}', 'app\controllers\ApiController:getUpdate');
    $app->get('/address/{id}', 'app\controllers\ApiController:getUserAddress');
    $app->delete('/user/{id}', 'app\controllers\ApiController:getDelete'); 
});

$app->get('/', 'app\controllers\HomeController:index');
$app->get('/about', 'app\controllers\HomeController:about');

$app->group('/usuario', function () use ($app) {
    $app->get('/novo', 'app\controllers\UsuariosController:getCreateForm');
    $app->post('/novo', 'app\controllers\UsuariosController:getCreate');
    $app->get('/visualizar/{id}', 'app\controllers\UsuariosController:getView');
    $app->get('/list', 'app\controllers\UsuariosController:getList');
    $app->get('/alterar/{id}', 'app\controllers\UsuariosController:geUpdateForm');
    $app->get('/delete/{id}', 'app\controllers\UsuariosController:getDelete');
    $app->post('/update', 'app\controllers\UsuariosController:getUpdate');
    $app->post('/search', 'app\controllers\UsuariosController:getSearch');
});

$app->run();
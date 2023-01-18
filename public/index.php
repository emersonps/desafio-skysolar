<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', 'app\controllers\HomeController:index');
$app->get('/user/{id}', 'app\controllers\HomeController:show');


$app->get('/about', 'app\controllers\AboutController:index');
$app->get('/users', 'app\controllers\UsersController:index');
$app->post('/user/subscribe', 'app\controllers\SubscribeController:store');

$app->run();
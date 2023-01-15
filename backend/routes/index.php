<?php 

use function src\slimConfiguration;
use App\Controllers\UserController;

$app = new \Slim\App(slimConfiguration());

// todas as rotas

$app->get('/', UserController::class . ':getUsers');

// fim das rotas

$app->run();
<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UserController
{
    public function getUsers(Request $request, Response $response, array $args): Response
    {
        // $response->getBody()->write("Hello Wrold!");
        $response = $response->withJson([
            "msg" => "Hello Wrold!"
        ]);

        return $response; 
    }
}


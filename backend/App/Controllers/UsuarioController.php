<?php

namespace App\Controllers;

use App\DAO\MySQL\Skysolar\UsuariosDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UsuarioController
{
    public function getUsuarios(Request $request, Response $response, array $args): Response
    {
        $response = $response->withJson([
            "msg" => "get usuarios testado"
        ]);

        return $response;
    }

    public function insertUsuario(Request $request, Response $response, array $args): Response
    {
        $response = $response->withJson([
            "msg" => "post usuarios testado"
        ]);

        return $response;
    }
    public function updateUsuario(Request $request, Response $response, array $args): Response
    {
        $response = $response->withJson([
            "msg" => "put usuarios testado"
        ]);

        return $response;
    }
    public function deleteUsuario(Request $request, Response $response, array $args): Response
    {
        $response = $response->withJson([
            "msg" => "delete usuarios testado"
        ]);

        return $response;
    }
}



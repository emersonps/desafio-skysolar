<?php

namespace App\Controllers;

use App\DAO\MySQL\Skysolar\EnderecosDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class EnderecoController
{
    public function getEnderecos(Request $request, Response $response, array $args): Response
    {
        $response = $response->withJson([
            "msg" => "get endereco testado"
        ]);

        return $response;
    }
    
    public function insertEndereco(Request $request, Response $response, array $args): Response
    {
         $response = $response->withJson([
            "msg" => "post endereco testado"
        ]);

        return $response;
    }

    public function updateEndereco(Request $request, Response $response, array $args): Response
    {
         $response = $response->withJson([
            "msg" => "put endereco testado"
        ]);
        return $response;
    }

    public function deleteEndereco(Request $request, Response $response, array $args): Response
    {
         $response = $response->withJson([
            "msg" => "delete endereco testado"
        ]);
        return $response;
    }
}


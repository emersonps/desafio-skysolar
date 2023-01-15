<?php

namespace App\Controllers;

use App\DAO\MySQL\Skysolar\UsuariosDAO;
use App\Models\MySQL\Skysolar\UsuarioModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UsuarioController
{
    public function getUsuarios(Request $request, Response $response, array $args): Response
    {
        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getAllUsuarios();
        $response = $response->withJson($usuarios);

        return $response;
    }

    public function getUsuario(Request $request, Response $response, array $args): Response
    {
        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getUsuario($args['id']);
        
        $response = $response->withJson($usuarios);

        return $response;
    }

    public function insertUsuario(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();
        
        $usuario = new UsuarioModel();
        $usuario->setNome($data['nome_completo'])
            ->setRg($data['rg'])
            ->setCpf($data['cpf'])
            ->setNascimento($data['dt_nascimento']);

        $usuarioDAO->insertUsuario($usuario);
        
        $response = $response->withJson([
            'message' => 'Usuário inserido com sucesso!' 
        ]);

        return $response;
    }
    public function updateUsuario(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();
        
        $usuarioDAO->updatetUsuario($data, $args['id']);
        
        $response = $response->withJson([
            'message' => 'Usuário alterado com sucesso!' 
        ]);

        return $response;
    }
    public function deleteUsuario(Request $request, Response $response, array $args): Response
    {
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->deleteUsuario($args['id']);
        
        $response = $response->withJson([
            'message' => 'Usuário excluído com sucesso!' 
        ]);

        return $response;
    }
}



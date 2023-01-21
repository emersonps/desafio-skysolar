<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use \app\DAO\MySQL\Skysolar\UsuariosDAO;
use \app\Models\MySQL\Skysolar\UsuarioModel;

use \app\DAO\MySQL\Skysolar\EnderecosDAO;
use \app\Models\MySQL\Skysolar\EnderecoModel;

class ApiController extends Controller
{
    public function getAll(Request $request, Response $response, array $args): Response
    {
        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getAllUsuarios();
        $response = $response->withJson($usuarios);

        return $response;
    }

    public function getUser(Request $request, Response $response, array $args): Response
    {

        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getUsuario($args['id']);
        $response = $response->withJson($usuarios);

        return $response;
    }

    public function getUpdate(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();

        $usuarioDAO->updatetUsuario($data, $args['id']);

        return $response->withJson([
            'message' => 'Usuário alterado com sucesso!'
        ]);
    }
    public function getDelete(Request $request, Response $response, array $args): Response
    {
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->deleteUsuario($args['id']);

        return $response->withJson([
            'message' => 'Usuário excluído com sucesso!'
        ]);
    }


    /**
     * ROTAS DE USUÁRIOS E ENDEREÇOS RELACIONADOS 
     */
    public function getUserAddress(Request $request, Response $response, array $args)
    {
        $usuariosDAO = new UsuariosDAO();
        $enderecosDAO = new EnderecosDAO();

        return $response->withJson([
            'usuario' => $usuariosDAO->getUsuario($args['id']),
            'enderecos' => $enderecosDAO->getEndereco($args['id'])
        ]);
    }
}

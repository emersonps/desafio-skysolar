<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use \app\DAO\MySQL\Skysolar\UsuariosDAO;
use \app\Models\MySQL\Skysolar\UsuarioModel;

class UsuariosController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new UsuarioModel;
    }
    public function getList(Request $request, Response $response, array $args)
    {
        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getAllUsuarios();
        $response = $response->withJson($usuarios);

        $this->view('usuarioslist', ['users' => $usuarios, 'title' => 'Usuários']);
    }

    public function getCreateForm()
    {
        return $this->view('usuarioform',['title'=> 'Criar usuário']);
    }

    public function getCreate(Request $request)
    {
        $data = $request->getParsedBody();

        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();

        $usuario = new UsuarioModel();
        $usuario->setNome($data['nome'])
            ->setRg($data['rg'])
            ->setCpf($data['cpf'])
            ->setNascimento($data['nascimento']);

        $usuarioDAO->insertUsuario($usuario);

        return $this->view('home', []);
    }
    
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
    public function getDelete(Request $request, Response $response, array $args)
    {
        var_dump($args['id']);
      
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->deleteUsuario($args['id']);

        $response = $response->withJson([
            'alert' => 'Usuário excluído com sucesso!'
        ]);

        return $this->view('home', []);
    }
}

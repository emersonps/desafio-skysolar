<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use \app\DAO\MySQL\Skysolar\UsuariosDAO;
use \app\Models\MySQL\Skysolar\UsuarioModel;

class EnderecoController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new UsuarioModel;
    }

    public function getCreateForm()
    {
        return $this->view('enderecoform',['title'=> 'Endereço']);
    }

    public function getCreate(Request $request)
    {
        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();

        $usuario = new UsuarioModel();
        $usuario->setNome($data['nome'])
            ->setRg($data['rg'])
            ->setCpf($data['cpf'])
            ->setNascimento($data['nascimento']);        

        $usuario = $usuarioDAO->insertUsuario($usuario);

        return $this->view('home', ['message' => 'Usuário cadastrado com sucesso!']);
    }

    public function getDelete(Request $request, Response $response, array $args)
    {     
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->deleteUsuario($args['id']);

        $response = $response->withJson([
            'alert' => 'Usuário excluído com sucesso!'
        ]);

        return $this->view('home', []);
    }
}

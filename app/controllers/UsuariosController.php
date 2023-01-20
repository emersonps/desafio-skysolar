<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use \app\DAO\MySQL\Skysolar\UsuariosDAO;
use \app\Models\MySQL\Skysolar\UsuarioModel;

use \app\DAO\MySQL\Skysolar\EnderecosDAO;
use \app\Models\MySQL\Skysolar\EnderecoModel;

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

        $usuarioDAO = new UsuariosDAO();

        $usuario = new UsuarioModel();
        $usuario->setNome($data['nome'])
            ->setRg($data['rg'])
            ->setCpf($data['cpf'])
            ->setNascimento($data['nascimento']);

        $usuario = $usuarioDAO->insertUsuario($usuario);

        // Array para armazenar os dois endereços
        $endederecos = [
            1 => [
                    'cep' => $data['cep'],
                    'logradouro' => $data['logradouro'],
                    'cidade' => $data['cidade'],
                    'estado' => $data['estado'],
                    'id_usuario' => $usuario,
                ],
            2 => [
                    'cep' => $data['cep2'],
                    'logradouro' => $data['logradouro2'],
                    'cidade' => $data['cidade2'],
                    'estado' => $data['estado2'],
                    'id_usuario' => $usuario,
                ]
        ];

        $enderecoDAO = new EnderecosDAO();

        // Armazena endereço de cada vez, se não tiver campo preenchido nos ou em um deles endereço não será inserido
        foreach($endederecos as $end){
            if($end['cep'] || $end['logradouro'] || $end['cidade']){

                $endereco = new EnderecoModel();
                
                $endereco->setCep($end['cep'])
                    ->setLogradouro($end['logradouro'])
                    ->setCidade($end['cidade'])
                    ->setEstado($end['estado'])
                    ->setUsuario_id($end['id_usuario']);
                
                $enderecoDAO->insertEndereco($endereco);
            }
        }
        
        return $this->redirect("visualizar/{$end['id_usuario']}");
    }

    public function getView(Request $request, Response $response, array $args)
    {
        $usuariosDAO = new UsuariosDAO();
        $enderecosDAO = new EnderecosDAO();

        $usuario = $usuariosDAO->getUsuario($args['id']);

        $enderecos = $enderecosDAO->getEndereco($args['id']);
        
        return $this->view('usuarioview', ['user' => $usuario[0], 'enderecos' => $enderecos, 'title' => 'Usuário']);
    }

    public function getUpdate(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $usuarioDAO = new UsuariosDAO();

        $usuarioDAO->updatetUsuario($data, $args['id']);

        $response = $response->withJson([
            'message' => 'Usuário alterado com sucesso!'
        ]);

        return redirect('home');

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

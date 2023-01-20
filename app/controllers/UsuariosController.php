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
        return $this->view('usuarioform', ['title' => 'Criar usuário']);
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
        foreach ($endederecos as $end) {
            if ($end['cep'] || $end['logradouro'] || $end['cidade']) {

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

    public function getSearch(Request $request, Response $response, array $args)
    {        
        $data = $request->getParsedBody();
        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->getSearchUsuario($data['feildsearch']);
        $response = $response->withJson($usuarios);

        $this->view('usuarioslist', ['users' => $usuarios, 'title' => 'Usuários']);
    }

    public function geUpdateForm(Request $request, Response $response, array $args)
    {
        $usuarioDAO = new UsuariosDAO();

        $usuariodata = $usuarioDAO->getUsuarioEndereco($args['id']);

        $usuario = $usuariodata[0];

        // dd($usuariodata);

        return $this->view('usuarioupdateform', ['user' => $usuario, 'endereco' => $usuariodata, 'id' => $args['id']]);
    }

    public function getUpdate(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        // dd($data);

        /** Atualização dos dados de usuários */
        $usuarioDAO = new UsuariosDAO();

        $usuario = [
            'nome_completo' => $data['usuario_nome'],
            'rg' => $data['usuario_rg'],
            'cpf' => $data['usuario_cpf'],
            'dt_nascimento' => $data['usuario_nascimento']
        ];

        /** Atualização dos dados de enderecos */
        //Tratamento para carregar os endereços individualmente 
        $endereco = [
            0 => [
                'id' => $data['id_endereco_0'],
                'logradouro' => $data['logradouro_0'],
                'cep' => $data['cep_0'],
                'cidade' => $data['cidade_0'],
                'estado' => $data['estado_0']
            ],
            1 => [
                'id' => $data['id_endereco_1'],
                'logradouro' => $data['logradouro_1'],
                'cep' => $data['cep_1'],
                'cidade' => $data['cidade_1'],
                'estado' => $data['estado_1']
            ]
        ];

        // Atualiazando usuário
        $usuarioDAO->updatetUsuario($usuario, $data['id']);

        $enderecoDAO = new EnderecosDAO();
        foreach($endereco as $end){
            if (!(empty($end['logradouro']) && empty($end['cep']) && empty($end['cidade']) && empty($end['estado']))) {
                //Corrigir bug do ID
                $enderecoDAO->updatetEndereco($end, $end['id']);
            }
        }

        $usuarioDAO->updatetUsuario($usuario, $data['id']);

        return $this->redirect('list', []);
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

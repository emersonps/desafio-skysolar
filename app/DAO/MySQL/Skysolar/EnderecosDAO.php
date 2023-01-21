<?php

namespace app\DAO\MySQL\Skysolar;

use App\Models\MySQL\Skysolar\EnderecoModel;
use \app\Models\MySQL\Skysolar\EnderecosModel;

class enderecosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEnderecos(): array
    {
        $enderecos = $this->pdo
            ->query('SELECT
                id,
                cep,
                logradouro,
                bairro,
                cidade,
                estado,
                usuario_id
                FROM enderecos')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $enderecos;
    }

    public function getEndereco(int $id): array
    {
        $endereco = $this->pdo->query("
                        SELECT * 
                        FROM 
                        enderecos WHERE usuario_id = {$id}")
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $endereco;
    }
    public function insertEndereco(EnderecoModel $endereco): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO enderecos VALUES(
            null,
            :cep,
            :logradouro,
            :bairro,
            :cidade,
            :estado,
            :usuario_id
        );');

        $statement->execute([
            'cep' => $endereco->getCep(),
            'logradouro' => $endereco->getLogradouro(),
            'bairro' => $endereco->getBairro(),
            'cidade' => $endereco->getCidade(),
            'estado' => $endereco->getEstado(),
            'usuario_id' => $endereco->getUsuario_id()
        ]);
    }

    /**
     * Summary of updatetUsuario
     * @param array $data
     * @param int $id
     * @return void
     */

    public function updatetEndereco(array $data, int $id): void
    {        
        $statement = $this->pdo
            ->prepare("UPDATE enderecos SET 
                logradouro = :logradouro,
                cep = :cep,
                cidade = :cidade,
                estado = :estado WHERE id={$id}
            ");
        $statement->execute([
            'logradouro' => $data['logradouro'],
            'cep' => $data['cep'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado']
        ]);
    }

    public function deleteUsuario(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM endereco WHERE id = :id');
        $statement->execute([
            'id' => $id
        ]);
    }
}

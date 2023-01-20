<?php

namespace app\DAO\MySQL\Skysolar;

use \app\Models\MySQL\Skysolar\UsuarioModel;

class UsuariosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsuarios(): array
    {
        $usuarios = $this->pdo
            ->query('SELECT
                id,
                nome_completo,
                rg,
                cpf,
                dt_nascimento
                FROM usuarios')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $usuarios;
    }

    public function getUsuario(int $id): array
    {
        $usuarios = $this->pdo
            ->query('SELECT
                nome_completo,
                rg,
                cpf,
                dt_nascimento
                FROM usuarios WHERE
                id=' . $id)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $usuarios;
    }

    public function getSearchUsuario(string $val): array
    {
        $usuarios = $this->pdo
            ->query("SELECT
                nome_completo,
                rg,
                cpf,
                dt_nascimento
                FROM usuarios WHERE
                nome_completo like '%$val%'")
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $usuarios;
    }

    public function getUsuarioEndereco(int $id): array
    {
        $usuario = $this->pdo
            ->query("SELECT
                    u.nome_completo,
                    u.rg,
                    u.cpf,
                    u.dt_nascimento,
                    e.id as id_endereco,
                    e.cep as cep,
                    e.logradouro as logradouro,
                    e.cidade as cidade,
                    e.estado as estado,
                    e.usuario_id as usuario 
                FROM usuarios as u
                LEFT JOIN enderecos as e on e.usuario_id = u.id
                WHERE
                u.id = $id")
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function insertUsuario(UsuarioModel $usuario): int
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO usuarios VALUES(
            null,
            :nome_completo,
            :rg,
            :cpf,
            :dt_nascimento
        );');

        $statement->execute([
            'nome_completo' => $usuario->getNome(),
            'rg' => $usuario->getRg(),
            'cpf' => $usuario->getCpf(),
            'dt_nascimento' => $usuario->getNascimento()
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * Summary of updatetUsuario
     * @param array $data
     * @param int $id
     * @return void
     */
    public function updatetUsuario(array $data, int $id): void
    {
        $statement = $this->pdo
            ->prepare("UPDATE usuarios SET 
                nome_completo = :nome_completo,
                rg = :rg,
                cpf = :cpf,
                dt_nascimento = :dt_nascimento WHERE id={$id}
            ");
        $statement->execute([
            'nome_completo' => $data['nome_completo'],
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'dt_nascimento' => $data['dt_nascimento']
        ]);
    }

    public function deleteUsuario(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM usuarios WHERE id = :id');
        $statement->execute([
            'id' => $id
        ]);
    }
}

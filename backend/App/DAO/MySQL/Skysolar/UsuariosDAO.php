<?php

namespace App\DAO\MySQL\Skysolar;

use App\Models\MySQL\Skysolar\UsuarioModel;

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

    public function insertUsuario(UsuarioModel $usuario): void
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
    }

    public function deleteUsuario(int $id) : void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM usuarios WHERE id = :id');
        $statement->execute([
            'id' => $id
        ]);
    }
}




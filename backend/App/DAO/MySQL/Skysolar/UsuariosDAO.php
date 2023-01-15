<?php

namespace App\DAO\MySQL\Skysolar;

class UsuariosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function teste()
    {
        $usuarios = $this->pdo
            ->query('SELECT * FROM usuarios;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        echo "<pre>";
        foreach($usuarios as $usuario){
            var_dump($usuario);
        }
        die;
    }
}




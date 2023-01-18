<?php

namespace app\controllers;
use app\traits\View;

class SubscribeController
{
    public function store()
    {
        $this->view('contato', [
            'title' => 'Cadastro',
            'nome' => "Emerson"
        ]);
    }
}
<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class AboutController extends Controller
{
    public function index()
    {
        $this->view('about', [
            'title' => 'Sobre nós',
        ]);
    }
}
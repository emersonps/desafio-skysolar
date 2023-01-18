<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', [
            'title' => 'Skysolar',
            'nome' => 'Skysolar',
        ]);
    }
}
<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use app\models\Users;

class UsersController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new Users;
    }
    public function index()
    {
        $users = new Users;
        $users = $users->all();

        $this->view('users', ['users' => $users, 'title' => 'Usuários']);
    }
}
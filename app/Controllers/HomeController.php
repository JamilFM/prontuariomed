<?php

namespace App\Controllers;
use \App\Models\User;

class HomeController
{
    /** * Listagem de usuários */
    public function index()
    {

        \App\View::make('Login','home/index');
    }

    public function login()
    {
        // pega os dados do formuário
        $user = isset($_POST['user']) ? $_POST['user'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;


       User::select($user, $password);

            header('Location: /home');
            exit;

    }
    public function home()
    {

        \App\View::make('Home','home/home');
    }


}
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        try {
            $db = db_connect();

            $db->initialize();

            if ($db->connID) {
                echo "Conexão OK";
            }
        } catch (\Throwable $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }

        return '';
    }

    public function alunos(): string
    {
        $userModel = model('UserModel');

        $users = $userModel->findAll();

        $dados = [
            'alunos' => $users
        ];

        return view('alunos', $dados);
    }
}

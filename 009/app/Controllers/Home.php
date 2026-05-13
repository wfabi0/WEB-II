<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('alunos');
    }

    public function cadastrarAluno()
    {
        $nome = $this->request->getPost('nome_alu');
        $nota = $this->request->getPost('nota_alu');

        try {
            $model = model('AlunoModel');
            $data = [
                'nome_alu' => $nome,
                'nota_alu' => $nota
            ];

            $model->save($data);

            return redirect()->to('/')->with('sucesso', 'Aluno cadastrado com sucesso!');
        } catch (\Throwable $_) {
            return redirect()->to('/')->with('erro', 'Falha ao cadastrar aluno.');
        }
    }
}

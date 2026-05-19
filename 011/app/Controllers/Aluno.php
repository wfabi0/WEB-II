<?php

namespace App\Controllers;

class Aluno extends BaseController
{

    public function create()
    {
        $body = $this->request->getJSON();

        $alunoService = service("alunos");
        $res = $alunoService->create($body->nome_alu, $body->nota_alu, $body->cpf_alu);
        return $this->response->setJSON($res);
    }

    public function getById($alunoId = null) {
        $alunoService = service("alunos");
        $res = $alunoService->getById($alunoId);
        return $this->response->setJSON($res);
    }

    public function getAll() {
        $alunoService = service("alunos");
        $res = $alunoService->getAll();
        return $this->response->setJSON($res);
    }

    // public function update($id, $nome_alu, $nota_alu, $cpf_alu) {
    //     $alunoService = service("alunos");
    //     $res = $alunoService->update($id, $nome_alu, $nota_alu, $cpf_alu);
    //     return $this->response->setJSON($res);
    // }

    // public function delete($id) {
    //     $alunoService = service("alunos");
    //     $res = $alunoService->delete($id);
    //     return $this->response->setJSON($res);
    // }

    // public function getMaxId() {
    //     $alunoService = service("alunos");
    //     $res = $alunoService->getMaxId();
    //     return $this->response->setJSON($res);
    // }

}

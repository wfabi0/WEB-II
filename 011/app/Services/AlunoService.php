<?php

namespace App\Services;

class AlunoService
{

    private $alunoModel;

    public function __construct()
    {
        $this->alunoModel = model("AlunoModel");
    }

    public function create(string $nome_alu, float $nota_alu, string $cpf_alu)
    {
        $dados = [
            "nome_alu" => $nome_alu,
            "nota_alu" => $nota_alu,
            "cpf_alu" => $cpf_alu
        ];
        $aluno = $this->alunoModel->insert($dados);
        if (!$aluno) return ["erro" => "Não foi possível criar esse aluno."];
        return [
            "sucesso" => true,
            "data" => $aluno
        ];
    }

    public function getById(string $alunoId)
    {
        $aluno = $this->alunoModel->find($alunoId);
        if (!$aluno) return ["erro" => "Aluno não encontrado."];
        return [
            "sucesso" => true,
            "data" => $aluno
        ];
    }

    public function getAll()
    {
        $aluno = $this->alunoModel->findAll();
        return [
            "sucesso" => true,
            "data" => $aluno
        ];
    }

    public function update(string $id, string $nome_alu, float $nota_alu, string $cpf_alu)
    {
        $aluno = $this->alunoModel->find($id);
        if (!$aluno) return ["erro" => "Aluno não encontrado."];
        $dados = [
            "nome_alu" => $nome_alu,
            "nota_alu" => $nota_alu,
            "cpf_alu" => $cpf_alu
        ];
        $this->alunoModel->update($id, $dados);
        return ["sucesso" => true];
    }

    public function delete(string $id)
    {
        $aluno = $this->alunoModel->find($id);
        if (!$aluno) return ["erro" => "Aluno não encontrado."];
        $aluno->delete();
        return ["sucesso" => true];
    }

    public function getMaxId()
    {
        $maxId = $this->alunoModel->selectMax('id')->get()->getRow()->id;
        return ["sucesso" => true, "maxId" => $maxId];
    }
}

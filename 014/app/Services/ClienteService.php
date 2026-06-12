<?php

namespace App\Services;

use App\Models\ClienteModel;

class ClienteService
{
    protected $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
    }

    public function getAllClientes()
    {
        return $this->clienteModel->getAllClientes();
    }

    public function salvarCliente($dados)
    {
        $id = $dados['id'] ?? null;

        if ($this->clienteModel->save($dados)) {
            return [
                'status' => 'success',
                'id'     => $id ? $id : $this->clienteModel->getInsertID()
            ];
        }

        return [
            'status'  => 'error',
            'message' => implode('<br>', $this->clienteModel->errors())
        ];
    }

    public function excluirCliente($id)
    {
        if ($id && $this->clienteModel->delete($id)) {
            return ['status' => 'success'];
        }

        return [
            'status'  => 'error',
            'message' => 'Não foi possível excluir o cliente.'
        ];
    }
}

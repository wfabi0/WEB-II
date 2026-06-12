<?php

namespace App\Services;

use App\Models\EstadoModel;

class EstadoService
{
    protected $estadoModel;

    public function __construct()
    {
        $this->estadoModel = new EstadoModel();
    }

    public function getEstados()
    {

        try {

            $estados = $this->estadoModel->select('id, nome')->orderBy('nome')->findAll();
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Erro ao selecionar os campos: ' . $e->getMessage()
            ];
        }

        return [
            'status' => 'success',
            'data' => $estados
        ];
    }
}

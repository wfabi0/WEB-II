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
            $estados = $this->estadoModel->findAll();
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Erro de Banco de Dados: ' . $e->getMessage()
            ];
        }

        return [
            'status' => 'success',
            'data' => $estados
        ];
    }
}

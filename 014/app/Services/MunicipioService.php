<?php
namespace App\Services;

use App\Models\MunicipioModel;

class MunicipioService
{
    protected $municipioModel;

    public function __construct()
    {
        $this->municipioModel = new MunicipioModel();
    }

    public function getMunicipiosByEstado($estadoId)
    {
        try {
            $municipios = $this->municipioModel->getCidadesByEstado($estadoId);
       
        } catch (\Exception $e) {
            return [
                'status'  => 'error',
                'message' => 'Erro ao selecionar os campos: ' . $e->getMessage()
            ];
        }

        if (empty($municipios)) {
            return [
                'status'  => 'error',
                'message' => 'Nenhum município encontrado para o estado selecionado.'
            ];
        }

        return [
            'status' => 'success',
            'data'   => $municipios 
        ];
    }
}

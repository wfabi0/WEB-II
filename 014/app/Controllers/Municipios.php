<?php

namespace App\Controllers;

use App\Services\MunicipioService;

class Municipios extends BaseController
{
    public function buscarCidades()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setBody('Acesso não autorizado');
        }

        $json = $this->request->getJSON();
        $estadoId = $json->estado ?? null;

        $municipioService = new MunicipioService();
        $r = $municipioService->getMunicipiosByEstado($estadoId);

        return $this->response->setJSON([
            'status'   => $r['status'] ?? 'success',
            'cidades'  => $r['data'] ?? [],
            'csrfHash' => csrf_hash()
        ]);
    }
}

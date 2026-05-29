<?php

namespace App\Controllers;

class Municipio extends BaseController
{
    public function getByEstado($estadoId)
    {

        $municipioService = service('municipio');
    
        $r = $municipioService->getMunicipiosByEstado($estadoId);

        if ($r['status'] === 'error') return $r['message'];

        $municipios = $r['data'];

        return $this->response->setJSON($municipios);
        
    }
}

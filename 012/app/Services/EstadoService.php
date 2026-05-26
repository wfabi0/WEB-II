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
        /*
            Retorna a lista de estados.
        */

    }

}
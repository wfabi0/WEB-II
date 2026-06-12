<?php

namespace App\Controllers;

use App\Services\EstadoService;
use App\Services\ClienteService;

class Home extends BaseController
{
    public function index(): string
    {
        $estadoService = new EstadoService();
        $clienteService = new ClienteService(); 

        $r = $estadoService->getEstados();

        if ($r['status'] === 'error') {
            return $r['message'];
        }

        $estados = $r['data'];
        
        $clientes = $clienteService->getAllClientes();

        return view('index', [
            'estados'  => $estados,
            'clientes' => $clientes,
        ]);
    }
}
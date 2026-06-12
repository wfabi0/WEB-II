<?php

namespace App\Controllers;

use App\Services\ClienteService;
use App\Models\ClienteModel;

class Clientes extends BaseController
{
    public function salvar()
    {
        $clienteModel = new ClienteModel();

        $dados = $this->request->getPost();

        if ($clienteModel->save($dados)) {
            return redirect()->to('/')->with('success', 'Cliente salvo com sucesso!');
        } else {
            return redirect()->back()->withInput()->with('errors', $clienteModel->errors());
        }
    }

    public function excluir()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setBody('Acesso negado');
        }

        $json = $this->request->getJSON();
        $id = $json->id ?? null;

        $clienteService = new ClienteService();
        $r = $clienteService->excluirCliente($id);

        $r['csrfHash'] = csrf_hash();

        return $this->response->setJSON($r);
    }
}

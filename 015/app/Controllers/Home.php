<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        session();
        return view('index');
    }


    public function consultaCep()
    {
        $cep = $this->request->getPost('cep');

        $cepService = service('cep');

        $r = $cepService->consultaCep($cep);

        if ($r['status'] == 'success') {
            return redirect()
                ->back()
                ->with('cepData', $r['data']);
        } else {
           return redirect()
                ->back()
                ->with('error', 'Erro ao consultar o CEP. ' . $r['msg']);
        }
    }
}
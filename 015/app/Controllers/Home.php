<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }


    public function consultaCep()
    {
        $cep = $this->request->getPost('cep');

        $cepService = service('cep');

        $r = $cepService->consultaCep($cep);

        if ($r['status'] == 'success') {
            d($r['data']);
        } else {
            echo $r['msg'];
        }
    }
}
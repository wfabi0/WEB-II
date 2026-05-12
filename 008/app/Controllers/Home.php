<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = db_connect();

        $db->initialize();

        if ($db->connID) {
            echo "Conexão OK";
        } else {
            echo "Conexão FALHA";
        }

        return '';
    }
}

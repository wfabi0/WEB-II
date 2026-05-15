<?php

namespace App\Controllers;
/*
    Controlador para a página inicial do sistema.
     - index: Exibe a página inicial do sistema.
*/
class Home extends BaseController
{
    /**
     * Método para exibir a página inicial do sistema.
     * 
     * Este método retorna a view 'home/index', que contém o 
     * conteúdo da página inicial do sistema.
     */
    public function index(): string
    {
        return 'home/index - Implementar ainda...';
    }
}

<?php

namespace App\Controllers;
/*
    Controlador para páginas da área restrita do sistema.
        - index: Exibe a página de boas-vindas da área restrita do sistema.

*/
class Admin extends BaseController
{

    /*
        Método para exibir a página de boas-vindas da área restrita do sistema.
        Este método retorna a view 'admin/index', que contém a mensagem de boas-vindas 
        para os usuários autenticados na área restrita do sistema.
        Este método é protegido por autenticação, garantindo que apenas usuários 
        autenticados possam acessar a área restrita do sistema, assim a primeira coisa a ser 
        feita é verificar se o usuário está autenticado, caso contrário,
        redirecionar para a página de login.
    */

    public function index(): string
    {
        return 'Admin/index - Implementar ainda...';
    }
}

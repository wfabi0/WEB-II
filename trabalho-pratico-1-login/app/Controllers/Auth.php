<?php

namespace App\Controllers;
/*
    Controllador pelos processos de autenticação do sistema.
     - login: Exibe a página de login.
     - logout: Realiza o processo de logout do sistema.
     - doLogin: Processa o login do usuário.

*/
class Auth extends BaseController
{
    /**
     * Método para exibir a página de login.
     * 
     * Este método retorna a view 'auth/login', que contém o formulário de login para os usuários.
     */
    public function login(): string
    {
        return view('auth/login');
    }

    /**
     * Método para realizar o logout do sistema.
     * 
     * Este método implementa o processo de logout, limpando a sessão do usuário.
     * 
     * Veja a referência em:
     * https://codeigniter.com/user_guide/libraries/sessions.html#using-the-session-class
     * 
     * Após o logout, o usuário é redirecionado para a página de login.
     */
    public function logout() : string
    {
        //Implementar processo de logout aqui
        return 'Auth/logout - Impleemntar ainda...';
    }

    /**
     * Método para processar o login do usuário.
     * 
     * Este método implementa o processo de login, validando as credenciais do 
     * usuário.
     * Por enquanto não utilize banco de dados, apenas valide as credenciais consideranando
     * um usuário fixo, por exemplo:
     * - Usuário: admin
     * - Senha: password
     * 
     * Caso as credenciais sejam válidas, o usuário é autenticado e 
     * redirecionado para a área restrita.
     * 
     * Autenticar um usuário significa criar uma sessão para o usuário, onde as 
     * informações de autenticação são armazenadas na sessão do usuário, 
     * permitindo que o sistema reconheça o usuário autenticado em futuras requisições.
     * 
     * Veja a referência em:
     * https://codeigniter.com/user_guide/libraries/sessions.html#using-the-session-class
     * 
     * Caso contrário, uma mensagem de erro é exibida na tela do formulário de 
     * login, usando flashdata para exibir a mensagem de erro na tela do 
     * formulário de login.
     */
    public function doLogin() : string
    {
        //Implementar processo de login aqui
        return "Auth/doLogin - Implementar ainda...";
    }
}

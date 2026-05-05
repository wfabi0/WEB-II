<?php

namespace App\Controllers;

class Home extends BaseController
{

    private $dadosCabecalho;

    public function initController($request, $response, $logger)
    {

        parent::initController($request, $response, $logger);

        $this->dadosCabecalho = [
            "titulo" => 'Blog Teste'
        ];

        helper("html");
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function home(): string
    {
        return view('header', $this->dadosCabecalho) .
            view('home_content') .
            view('footer');
    }

    public function quemSomos(): string
    {

        $this->dadosCabecalho['titulo'] = $this->dadosCabecalho['titulo'] .
            " | Quem Somos";


        $dadosConteudo = [
            "alunos" => ['Ana', 'Bernardo', 'Carlos', 'Paula'],

            "notas" => [
                ["aluno" => "Ana", "nota" => 10],
                ["aluno" => "Bernardo", "nota" => 9],
                ["aluno" => "Carlos", "nota" => 8],
                ["aluno" => "Paula", "nota" => 7]
            ]
        ];

        return view('header', $this->dadosCabecalho) .
            view('quem_somos_content', $dadosConteudo, ['cache' => 60, 'cache_name' => 'quem_somos_content_cache']) .
            view('footer');
    }

    public function noticias(): string
    {
        return view('header', $this->dadosCabecalho) .
            view('noticias_content') .
            view('footer');
    }

    public function faleConosco(): string
    {
        return view('header', $this->dadosCabecalho) .
            view('fale_conosco_content') .
            view('footer');
    }
}

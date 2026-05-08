<?php

namespace App\Controllers;

class Home extends BaseController
{


    public function initController($request, $response, $logger)
    {

        parent::initController($request, $response, $logger);

        //Método para ser executado antes de cada método do controller

    }

    public function home(): string
    {
        return view('home');
    }

    public function quemSomos(): string
    {
        $view = service("renderer");

        return $view->setVar("campus", "São João Evangelista")
            ->setVar("curso", "Engenharia de Pesca")
            ->render("quem-somos")
        ;
        // return view('quem-somos');
    }

    public function noticias(): string
    {
        $data = [
            'hello' => "Hello, darkness, my old friend, I've come to talk with you again, Because a vision softly creeping, Left its seeds while I was sleeping, And the vision that was planted in my brain, Still remains, Within the sound of silence"
        ];

        return view('noticias', $data);
    }

    public function faleConosco(): string
    {
        return view('fale-conosco');
    }
}

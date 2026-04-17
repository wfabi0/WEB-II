<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home/index');
    }

    public function blog(): string
    {
        return "Quem responde é o Home::blog";
    }

    public function sobre(): string
    {
        return "Quem responde é Home::sobre";
    }

    public function ajuda(): string
    {
        return "Quem responde é Home::ajuda";
    }
}

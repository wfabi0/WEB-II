<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard(): string
    {
        return "Quem responde é Admin::dashboard";
    }

    function login(): string
    {
        return "Quem responde é Admin::login";
    }

    function logout(): string
    {
        return "Quem responde é Admin::logout";
    }
}

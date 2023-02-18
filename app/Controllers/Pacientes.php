<?php

namespace App\Controllers;

class Pacientes extends BaseController
{
    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
    }

    public function index()
    {
        $data['contenido'] = 'pacientes/pacientes';

        return view('index', $data);
    }
}

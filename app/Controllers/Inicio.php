<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\PersonalMedicoModel;

class Inicio extends BaseController
{
    protected $session;
    protected $usuario;
    protected $personal;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
    	$this->usuario = new UsuarioModel;
        $this->personal = new PersonalMedicoModel();

        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data["contenido"] = "dashboard/dashboard";
        $data['cant_usuarios'] = $this->usuario->cantUsuarios();
        $data['cant_personal'] = $this->personal->cantPersonalMedico();
        return view('index', $data);
    }
}

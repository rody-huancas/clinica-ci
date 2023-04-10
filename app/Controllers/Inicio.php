<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\PersonalMedicoModel;
use App\Models\CajaModel;
use App\Models\HistoriaClinicaModel;

class Inicio extends BaseController
{
    protected $session;
    protected $usuario;
    protected $personal;
    protected $caja;
    protected $historia;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->usuario = new UsuarioModel;
        $this->personal = new PersonalMedicoModel();
        $this->caja = new CajaModel();
        $this->historia = new HistoriaClinicaModel();

        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['contenido'] = 'dashboard/dashboard';
        $data['cant_usuarios'] = $this->usuario->cantUsuarios();
        $data['cant_personal'] = $this->personal->cantPersonalMedico();
        $data['cant_caja'] = $this->caja->cantCaja();
        $data['cant_historia'] = $this->historia->cantHistoriaClinica();
        $data['historia'] = $this->historia->getResultados();
        return view('index', $data);
    }
}

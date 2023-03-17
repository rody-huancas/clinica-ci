<?php

namespace App\Controllers;

use App\Models\HistoriaClinicaModel;
use App\Models\CajaModel;
use DateTime;

class Caja extends BaseController
{

    protected $historia;
    protected $caja;
    protected $session;
    protected $db;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }

        $this->historia = new HistoriaClinicaModel();
        $this->caja = new CajaModel();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        helper('text');
    }

    public function index()
    {
        $data['titulo'] = "Reporte de Caja";
        $data['contenido'] = 'caja/caja';
        $data["caja"] = $this->caja->findAll();
        return view('index', $data);
    }

    public function registrar()
    {
        $data["titulo"] = "Registrar Nueva Venta";
        $data["contenido"] = "caja/registrar";
        return view("index", $data);
    }

    // Registrar datos
    public function registrarDatos()
    {
    }
}

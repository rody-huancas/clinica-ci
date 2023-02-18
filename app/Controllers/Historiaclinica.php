<?php

namespace App\Controllers;

use App\Models\HistoriaClinicaModel;

class Historiaclinica extends BaseController
{
    protected $historia;
    protected $session;


    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->historia = new HistoriaClinicaModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['titulo'] = "Historias Clínicas";
        $data['contenido'] = 'historiaclinica/historiaclinica';
        $data["historia"] = $this->historia->findAll();
        return view('index', $data);
    }

    public function registrar()
    {
        $data["historia"] = $this->historia->findAll();
        $data["titulo"] = "Registrar Nueva Historia Clínica";
        $data["contenido"] = "historiaclinica/registrar";
        return view("index", $data);
    }

    // Registrar datos
    public function registrarDatos()
    {
    }

    public function verRegistro($id)
    {
    }

    // Actualizar Usuario
    public function actualizarDatos($id)
    {
    }

    // Eliminar datos
    public function eliminarRegistro($id)
    {
    }
}

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
        $fechainicio  = $this->request->getPost("fechainicio");
        $fechafin  = $this->request->getPost("fechafin");

        if ($this->request->getPost("buscar")) {
            $cajaRes = $this->caja->getVentasbyDate($fechainicio, $fechafin);
        } else {
            $cajaRes = $this->caja->getCaja();
        }

        // var_dump($cajaRes);
        // return;

        $data['titulo'] = "Reporte de Caja";
        $data['contenido'] = 'caja/caja';
        $data["fechainicio"] = $fechainicio;
        $data["fechafin"] = $fechafin;
        $data["caja"] = $cajaRes;
        return view('index', $data);
    }

    public function registrar()
    {
        $data["titulo"] = "Registrar Nueva Venta";
        $data["contenido"] = "caja/registrar";
        return view("index", $data);
    }

    public function keyBusqueda($value)
    {
        $query = $this->historia->getBusqueda($value);
        return json_encode(array("historiaclinica" => $query));
    }

    public function mostrarPacienteID($idhistoria)
    {
        $query = $this->historia->getResultadosID($idhistoria);
        return json_encode(array("historiaclinica" => $query));
    }

    // Registrar datos
    public function registrarDatos()
    {
        if ($this->request->getMethod() == "post") {

            $txt_IDHistoria = $this->request->getPost("txt_IDHistoria");
            $referido = $this->request->getPost("referido");
            $gestion = $this->request->getPost("gestion");
            $comentario = $this->request->getPost("comentario");
            $ingreso =  $this->request->getPost("ingreso");
            $egreso_one =  $this->request->getPost("egreso_one");
            $egreso_two =  $this->request->getPost("egreso_two");
            $total = $ingreso - ($egreso_one + $egreso_two);
            // Calcular la edad a partir de la fecha de nacimiento
            $fechaNac = new DateTime();
            $hoy = new DateTime();
            $edad = $fechaNac->diff($hoy)->y;

            // Generar código único

            $data = [
                'idhistoria' => $txt_IDHistoria,
                'referido' => $referido,
                'comentario' => $comentario,
                'gestion' => $gestion,
                'ingreso' =>  $ingreso,
                'egreso_one' =>  $egreso_one,
                'egreso_two' => $egreso_two,
                'total' =>  $total,
                'fecha_creacion' => date('Y-m-d'),
                'hora_creacion' => date('H:i:s')
            ];

            // Guardar registro en la base de datos
            $this->caja->save($data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos registrados correctamente");

            return redirect()->to(base_url() . "/caja");
        } else {
            $data["contenido"] = "historiaclinica/registrar";
            return view("index", $data);
        }
    }

    public function verRegistro($id)
    {
        $caja = $this->caja->getResultado($id);
        $data["historia"] = $caja;
        $data["titulo"] = "Actualizar Historia Clínica";
        $data["contenido"] = "caja/actualizar";
        return view("index", $data);
    }
}

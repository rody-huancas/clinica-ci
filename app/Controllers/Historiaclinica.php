<?php

namespace App\Controllers;

use App\Models\HistoriaClinicaModel;
use DateTime;

class Historiaclinica extends BaseController
{
    protected $historia;
    protected $session;
    protected $db;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->historia = new HistoriaClinicaModel();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        helper('text');
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
        if ($this->request->getMethod() == "post") {
            $nombre = $this->request->getPost("nombre");
            $apellidos = $this->request->getPost("apellidos");
            $dni = $this->request->getPost("dni");
            $telefonoPaciente = $this->request->getPost("telefonoPaciente");
            $direccion = $this->request->getPost("direccion");
            $fecha = $this->request->getPost("fecha");
            $distrito = $this->request->getPost("distrito");
            $provincia = $this->request->getPost("provincia");
            $parentezco = $this->request->getPost("parentezco");
            $telefono = $this->request->getPost("telefono");
            $dniPariente = $this->request->getPost("dniPariente");
            $nombreMedico = $this->request->getPost("nombreMedico");
            $especialidad = $this->request->getPost("especialidad");
            $motivo = $this->request->getPost("motivo");

            // Calcular la edad a partir de la fecha de nacimiento
            $fechaNac = new DateTime($fecha);
            $hoy = new DateTime();
            $edad = $fechaNac->diff($hoy)->y;

            // Generar código único
            $cc_code = 'CC-' . str_pad($this->db->table('historiaclinica')->countAllResults() + 1, 7, '0', STR_PAD_LEFT);

            $data = [
                "codigohistoria" => $cc_code,
                "nombres" => $nombre,
                "apellidos" => $apellidos,
                "telefonoPaciente" => $telefonoPaciente,
                "edad" => $edad,
                "fechaNac" => $fecha,
                "distrito" => $distrito,
                "direccion" => $direccion,
                "fechaCreacion" => date('d/m/y'),
                "horaCreacion" => date('H:i:s'),
                "provincia" => $provincia,
                "parentezco" => $parentezco,
                "telefono" => $telefono,
                "dni" => $dni,
                "dnifamiliar" => $dniPariente,
                "idPersonal" => 100,
                "motivo" => $motivo
            ];

            // Guardar registro en la base de datos
            $this->historia->save($data);

            return redirect()->to(base_url() . "/historiaclinica");
        }
    }


    public function visualizar($id)
    {
        $historia = $this->historia->where('idhistoria', $id)->first();
        $data["historia"] = $historia;
        $data["titulo"] = "Historía Clínica";
        $data["contenido"] = "historiaclinica/visualizar";
        return view("index", $data);
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

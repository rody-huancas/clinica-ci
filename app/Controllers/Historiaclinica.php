<?php

namespace App\Controllers;

use App\Models\HistoriaClinicaModel;
use App\Models\PersonalMedicoModel;
use DateTime;

class Historiaclinica extends BaseController
{
    protected $historia;
    protected $session;
    protected $db;
    protected $personalmedico;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->historia = new HistoriaClinicaModel();
        $this->personalmedico = new PersonalMedicoModel();
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

    public function keyBusqueda($value)
    {
        $query = $this->personalmedico->getBusqueda($value);
        return json_encode(array("personal" => $query));
    }

    public function mostrarMedicoID($idPersonal)
    {
        $query = $this->personalmedico->getResultadosID($idPersonal);
        return json_encode(array("personal" => $query));
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
            $txt_IDPersonal = $this->request->getPost("txt_IDPersonal");
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
                "idPersonal" => $txt_IDPersonal,
                "motivo" => $motivo
            ];

            // Guardar registro en la base de datos
            $this->historia->save($data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos registrados correctamente");

            return redirect()->to(base_url() . "/historiaclinica");
        } else {
            $data["contenido"] = "historiaclinica/registrar";
            return view("index", $data);
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

    // ver registro
    public function verRegistro($id)
    {
        $historia = $this->historia->getResultado($id);
        $data["historia"] = $historia;
        $data["titulo"] = "Actualizar Historia Clínica";
        $data["contenido"] = "historiaclinica/actualizar";
        return view("index", $data);
    }



    // Actualizar Usuario
    public function actualizarDatos($id)
    {
        if ($this->request->getMethod() == "post") {
            $id = $this->request->getPost("id_");
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
            $txt_IDPersonal = $this->request->getPost("txt_IDPersonal");
            $motivo = $this->request->getPost("motivo");

            // Calcular la edad a partir de la fecha de nacimiento
            $fechaNac = new DateTime($fecha);
            $hoy = new DateTime();
            $edad = $fechaNac->diff($hoy)->y;


            $data = [
                "nombres" => $nombre,
                "apellidos" => $apellidos,
                "telefonoPaciente" => $telefonoPaciente,
                "edad" => $edad,
                "fechaNac" => $fecha,
                "distrito" => $distrito,
                "direccion" => $direccion,
                "provincia" => $provincia,
                "parentezco" => $parentezco,
                "telefono" => $telefono,
                "dni" => $dni,
                "dnifamiliar" => $dniPariente,
                "idPersonal" => $txt_IDPersonal,
                "motivo" => $motivo
            ];

            // Guardar registro en la base de datos
            $this->historia->update($id, $data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos actualizados correctamente");

            return redirect()->to(base_url() . "/historiaclinica");
        } else {
            $historia = $this->historia->getResultado($id);
            $data["historia"] = $historia;
            $data["titulo"] = "Actualizar Historia Clínica";
            $data["contenido"] = "historiaclinica/actualizar";
            return view("index", $data);
        }
    }


    function mostrarPDF($idhistoria)
    {
        // $data["seguimiento"] = $this->seguimiento->getResultadosOrden();
        $data['idhistoria'] = $idhistoria;

        echo view("historiaclinica/reporte", $data);
    }

    // Generar PDF
    function generarPDF($id)
    {
        $orden = $this->historia->findAll($id);

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle('Ordenes');
        $pdf->SetFont('Arial', 'B', 10);

        // Título
        $pdf->Cell(195, 5, "Reporte de Usuarios", 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 9);

        // $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Orden.pdf", "I");
    }




    // Eliminar datos
    public function eliminarRegistro($id)
    {
    }
}

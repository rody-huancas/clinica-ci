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
    protected $rules_historia;
    protected $validacion;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->validacion = \Config\Services::validation();
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
        $data["historia"] = $this->historia->getResultados();
        return view('index', $data);
    }

    public function reglas()
    {
        $this->rules_historia = [
            "nombre" => [
                "rules" => "required|max_length[20]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. m�xima de caracteres: [20]",
                ]
            ],
            "apellidos" => [
                "rules" => "required|max_length[30]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. maxima de caracteres: [30]",
                ]
            ],
            "dni" => [
                "rules" => "required|max_length[10]|is_unique[historiaclinica.dni,historiaclinica.idhistoria,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. m�xima de caracteres: [10]",
                    "is_unique" => "Ya existe un registro",

                ]
            ],
            "telefonoPaciente" => [
                "rules" => "required|max_length[15]|is_unique[historiaclinica.telefonoPaciente,historiaclinica.idhistoria,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. maxima de caracteres: [15]",
                    "is_unique" => "Ya existe un registro",
                ]
            ],
            "direccion" => [
                "rules" => "required|max_length[30]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. maxima de caracteres: [30]",
                ]
            ],
            "fecha" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                ]
            ],
            "distrito" => [
                "rules" => "required|max_length[15]",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                    "max_length" => "Cant. maxima de caracteres: [15]",

                ]

            ],
            "departamento" => [
                "rules" => "required|max_length[15]",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                    "max_length" => "Cant. maxima de caracteres: [15]",

                ]

            ],
            "provincia" => [
                "rules" => "required|max_length[15]",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                    "max_length" => "Cant. maxima de caracteres: [15]",

                ]

            ],
            "parentezco" => [
                "rules" => "required|max_length[20]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. m�xima de caracteres: [20]",
                ]
            ],
            "telefono" => [
                "rules" => "required|max_length[15]|is_unique[historiaclinica.telefono,historiaclinica.idhistoria,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. maxima de caracteres: [15]",
                    "is_unique" => "Ya existe un registro",
                ]
            ],
            "dniPariente" => [
                "rules" => "required|max_length[10]|is_unique[historiaclinica.dnifamiliar,historiaclinica.idhistoria,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. m�xima de caracteres: [10]",
                ]
            ],
            "motivo" => [
                "rules" => "required|max_length[30]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. m�xima de caracteres: [30]",
                ]
            ],
            "txt_IDPersonal" => [
                "rules" => "is_not_unique[personal.idPersonal]",
                "errors" => [
                    "is_not_unique" => "Valores no permitidos",
                ]
            ],
            "origen" => [
                "rules" => "required|max_length[30]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. m�xima de caracteres: [30]",
                ]
            ]
        ];
        return $this->rules_historia;
    }

    public function registrar()
    {
        $data["historia"] = $this->historia->findAll();
        $data["personal"] = $this->personalmedico->findAll();
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

        // Establecer la zona horaria
        // date_default_timezone_set('America/Lima');

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {
            $nombre = $this->request->getPost("nombre");
            $apellidos = $this->request->getPost("apellidos");
            $dni = $this->request->getPost("dni");
            $telefonoPaciente = $this->request->getPost("telefonoPaciente");
            $direccion = $this->request->getPost("direccion");
            $fecha = $this->request->getPost("fecha");
            $distrito = $this->request->getPost("distrito");
            $departamento = $this->request->getPost("departamento");
            $provincia = $this->request->getPost("provincia");
            $parentezco = $this->request->getPost("parentezco");
            $telefono = $this->request->getPost("telefono");
            $dniPariente = $this->request->getPost("dniPariente");
            $txt_IDPersonal = $this->request->getPost("txt_IDPersonal");
            $motivo = $this->request->getPost("motivo");
            $origen = $this->request->getPost("origen");

            // Calcular la edad a partir de la fecha de nacimiento
            $fechaNac = new DateTime($fecha);
            $hoy = new DateTime();
            $edad = $fechaNac->diff($hoy)->y;

            // Generar código único
            $cc_code = 'ES-' . str_pad($this->db->table('historiaclinica')->countAllResults() + 1, 7, '0', STR_PAD_LEFT);

            $data = [
                "codigohistoria" => $cc_code,
                "nombres" => $nombre,
                "apellidos" => $apellidos,
                "telefonoPaciente" => $telefonoPaciente,
                "edad" => $edad,
                "fechaNac" => $fecha,
                "distrito" => $distrito,
                "departamento" => $departamento,
                "direccion" => $direccion,
                "fechaCreacion" => date('d/m/y'),
                "horaCreacion" => date('H:i:s'),
                "provincia" => $provincia,
                "parentezco" => $parentezco,
                "telefono" => $telefono,
                "dni" => $dni,
                "dnifamiliar" => $dniPariente,
                "idPersonal" => $txt_IDPersonal,
                "motivo" => $motivo,
                "origen" => $origen
            ];

            // Guardar registro en la base de datos
            $this->historia->save($data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos registrados correctamente");

            return redirect()->to(base_url() . "/historiaclinica");
        } else {
            $data["validation"] = $this->validator;
            $data["personal"] = $this->personalmedico->findAll();
            $data["historia"] = $this->historia->findAll();
            $data["titulo"] = "Registrar Nueva Historia Clínica";
            $data["contenido"] = "historiaclinica/registrar";
            return view("index", $data);
        }
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
            $departamento = $this->request->getPost("departamento");
            $provincia = $this->request->getPost("provincia");
            $parentezco = $this->request->getPost("parentezco");
            $telefono = $this->request->getPost("telefono");
            $dniPariente = $this->request->getPost("dniPariente");
            $txt_IDPersonal = $this->request->getPost("txt_IDPersonal");
            $motivo = $this->request->getPost("motivo");
            $origen = $this->request->getPost("origen");

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
                "departamento" => $departamento,
                "direccion" => $direccion,
                "provincia" => $provincia,
                "parentezco" => $parentezco,
                "telefono" => $telefono,
                "dni" => $dni,
                "dnifamiliar" => $dniPariente,
                "idPersonal" => $txt_IDPersonal,
                "motivo" => $motivo,
                "origen" => $origen
            ];

            // Guardar registro en la base de datos
            $this->historia->update($id, $data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos actualizados correctamente");

            return redirect()->to(base_url() . "/historiaclinica");
        } else {
            $data["historiaclinica"] = $this->historia->where("idhistoria", $id)->first();
            $data["validation"] = $this->validator;
            $historia = $this->historia->getResultado($id);
            $data["personal"] = $this->personalmedico->findAll();
            $data["historia"] = $historia;
            $data["titulo"] = "Actualizar Historia Clínica";
            $data["contenido"] = "historiaclinica/actualizar";
            return view("index", $data);
        }
    }

    public function visualizar($id)
    {
        $historia = $this->historia->getResultado($id);
        $data["historia"] = $historia;
        $data["titulo"] = "Historía Clínica";
        $data["contenido"] = "historiaclinica/visualizar";
        return view("index", $data);
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
        $clinica = $this->historia->getResultado($id);

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle(utf8_decode('Historia Clínica'));
        $pdf->SetFont('Arial', 'B', 12);

        // Título
        $pdf->Cell(195, 5, utf8_decode('Historia Clínica'), 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 11);

        // header
        $pdf->Image(base_url() . '/public/dist/images/enfoque-salud.jpg', 45, 20, 45, 40, 'JPG');
        // N° de historia
        $pdf->Cell(130, 40, utf8_decode("N° de historia: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(160, -40, utf8_decode($clinica['codigohistoria']), 0, 0, 'R');
        // Fecha de creación
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-44, -25, utf8_decode("Fecha: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(160, 25, utf8_decode($clinica['fechaCreacion']), 0, 0, 'R');
        // Hora de creación
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-46.5, 40, utf8_decode("Hora: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(160, -40, utf8_decode($clinica['horaCreacion']), 0, 0, 'R');

        $pdf->Cell(0, 0, "", 0, 1, 'C');

        // Datos del Paciente
        $pdf->Line(10, 65, 200, 65);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 0, utf8_decode("DATOS DEL PACIENTE "), 0, 1, 'L');
        // nombre
        $pdf->Cell(20, 20, utf8_decode("Nombre: "), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(20, -5, utf8_decode($clinica["nombres"] ? $clinica["nombres"] : ""), 0, 0, 'L');
        // apellidos
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(158, -20, utf8_decode("Apellidos: "), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 35, utf8_decode($clinica["apellidos"] ? $clinica["apellidos"] : ""), 0, 0, 'C');
        // dni
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-15, 20, utf8_decode("DNI: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(180, -5, utf8_decode($clinica["dni"] ? $clinica["dni"] : ""), 0, 0, 'R');

        $pdf->Cell(0, 5, "", 0, 1, 'C');

        // fecha nacimiento
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(20, 10, utf8_decode("Fecha De Nacimiento: "), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(20, 5, utf8_decode($clinica["fechaNac"] ? $clinica["fechaNac"] : ""), 0, 0, 'L');
        // edad
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(158, -10, utf8_decode("Edad: "), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 25, utf8_decode($clinica["edad"] ? $clinica["edad"] : ""), 0, 0, 'C');
        // dni
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-15, 10, utf8_decode("Dirección: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(180, 5, utf8_decode($clinica["direccion"] ? $clinica["direccion"] : ""), 0, 0, 'R');

        $pdf->Cell(0, 5, "", 0, 1, 'C');

        // fecha nacimiento
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(20, 20, utf8_decode("Distrito: "), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(20, -5, utf8_decode($clinica["distrito"] ? $clinica["distrito"] : ""), 0, 0, 'L');
        // edad
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(158, -20, utf8_decode("Provincia: "), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 35, utf8_decode($clinica["provincia"] ? $clinica["provincia"] : ""), 0, 0, 'C');
        // DTTO
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-15, 20, utf8_decode("DTTO: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(180, -5, utf8_decode($clinica["departamento"] ? $clinica["departamento"] : ""), 0, 0, 'R');

        $pdf->Cell(0, 5, "", 0, 1, 'C');

        // telefono
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(20, 10, utf8_decode("Telefono: "), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(20, 5, utf8_decode($clinica["telefonoPaciente"] ? $clinica["telefonoPaciente"] : ""), 0, 0, 'L');
        // medico
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(158, -10, utf8_decode("Médico: "), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 25, utf8_decode($clinica["nombreMedico"] ? $clinica["nombreMedico"] : ""), 0, 0, 'C');
        // motivo
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(-15, 10, utf8_decode("Motivo: "), 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(180, 5, utf8_decode($clinica["motivo"] ? $clinica["motivo"] : ""), 0, 0, 'R');

        $pdf->Cell(0, 5, "", 0, 1, 'C');

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Enfoque Salud - " . utf8_decode($clinica["nombres"]) . " " . utf8_decode($clinica["apellidos"]) . ".pdf", "I");
    }





    // Eliminar datos
    public function eliminarRegistro($id)
    {
    }
}

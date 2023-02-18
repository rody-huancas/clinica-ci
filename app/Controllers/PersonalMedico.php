<?php

namespace App\Controllers;

use App\Models\PersonalMedicoModel;
use App\Models\TipoPersonalModel;
use App\Models\EspecialidadModel;
use App\Models\TipoDocumentoModel;


class PersonalMedico extends BaseController
{
    protected $personal;
    protected $tipopersonal;
    protected $especialidad;
    protected $tipodocumento;
    protected $validacion;
    protected $rules_per;
    protected $session;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->validacion = \Config\Services::validation();
        $this->personal = new PersonalMedicoModel();
        $this->tipopersonal = new TipoPersonalModel();
        $this->especialidad = new EspecialidadModel();
        $this->tipodocumento = new TipoDocumentoModel();
    }

    public function index()
    {
        $data['contenido'] = 'personalmedico/personalmedico';
        $data["titulo"] = "Personal Medico";
        $data["personal"] = $this->personal->getPersonal();
        $data["tipoespecialidad"] = $this->especialidad->findAll();
        $data["tipotrabajador"] = $this->tipopersonal->findAll();
        $data["tipodocumento"] = $this->tipodocumento->findAll();

        return view('index', $data);
    }

    public function reglas()
    {
        $this->rules_per = [
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
            "direccion" => [
                "rules" => "required|max_length[20]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. m�xima de caracteres: [20]",
                ]
            ],
            "celular" => [
                "rules" => "required|max_length[15]|is_unique[personal.celular,personal.idPersonal,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. maxima de caracteres: [15]",
                    "is_unique" => "Ya existe un registro",
                ]
            ],
            "nroDocumento" => [
                "rules" => "required|max_length[15]|is_unique[personal.numeroDocumento,personal.idPersonal,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "max_length" => "Cant. maxima de caracteres: [15]",
                    "is_unique" => "Ya existe un registro",
                ]
            ],
            "listStatus" => [
                "rules" => "required|in_list[1,2]",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                    "in_list" => "Valores no permitidos",
                ]
            ],
            "listGenero" => [
                "rules" => "required|in_list[1,2]",
                "errors" => [
                    "required" => "Debe seleccionar un valor.",
                    "in_list" => "Valores no permitidos",

                ]

            ],
            "edad" => [
                "rules" => "required",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                ]
            ],
            "apellidos" => [
                "rules" => "required|max_length[20]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. m�xima de caracteres: [20]",
                ]
            ],
            "celular" => [
                "rules" => "required|max_length[20]|is_unique[personal.celular,personal.idPersonal,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    "min_length" => "Cant. m�nima de caracteres: [5]",
                    "max_length" => "Cant. m�xima de caracteres: [20]",
                    "is_unique" => "Ya existe un registro",
                ]
            ],
            "listEspecialidad" => [
                "rules" => "is_not_unique[tipoespecialidad.idTipoEspecialidad]",
                "errors" => [
                    "is_not_unique" => "Valores no permitidos",
                ]
            ],
            "listTipoPersonal" => [
                "rules" => "is_not_unique[tipotrabajador.idTipoTrabajador]",
                "errors" => [
                    "is_not_unique" => "Valores no permitidos",
                ]
            ],
            "listDocumento" => [
                "rules" => "is_not_unique[tipodocumento.idTipoDocumento]",
                "errors" => [
                    "is_not_unique" => "Valores no permitidos",
                ]
            ]
        ];
        return $this->rules_per;
    }

    public function registrar()
    {
        $data["personal"] = $this->personal->getPersonal();
        $data["tipoespecialidad"] = $this->especialidad->findAll();
        $data["tipotrabajador"] = $this->tipopersonal->findAll();
        $data["tipodocumento"] = $this->tipodocumento->findAll();
        $data["titulo"] = "Personal Medico";
        $data["contenido"] = "personalmedico/registrar";

        return view("index", $data);
    }

    public function registrarDatos()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {

            $nombre =  $this->request->getPost("nombre");
            $apellidos =  $this->request->getPost("apellidos");
            $direccion =  $this->request->getPost("direccion");
            $celular =  $this->request->getPost("celular");
            $listGenero =  $this->request->getPost("listGenero");
            $nroDocumento =  $this->request->getPost("nroDocumento");
            $listStatus =  $this->request->getPost("listStatus");
            $edad =  $this->request->getPost("edad");
            $listEspecialidad =  $this->request->getPost("listEspecialidad");
            $listTipoPersonal =  $this->request->getPost("listTipoPersonal");
            $listDocumento =  $this->request->getPost("listDocumento");

            $data = [
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "direccion" => $direccion,
                "celular" => $celular,
                "genero" => $listGenero,
                "numeroDocumento" => $nroDocumento,
                "estado" => $listStatus,
                "fechaNac" => $edad,
                "idTipoEspecialidad" => $listEspecialidad,
                "idTipoTrabajador"  => $listTipoPersonal,
                "idTipoDocumento" => $listDocumento
            ];
            $this->personal->save($data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos registrados correctamente");

            return redirect()->to(base_url() . "/personalmedico");
        } else {
            $data["personal"] = $this->personal->findAll();
            $data["tipoespecialidad"] = $this->especialidad->findAll();
            $data["tipotrabajador"] = $this->tipopersonal->findAll();
            $data["tipodocumento"] = $this->tipodocumento->findAll();
            $data["contenido"] = "PersonalMedico/registrar";
            $data["validation"] = $this->validator;
            $data["titulo"] = "Personal Medico";
            return view("index", $data);
        }
    }

    public function verRegistro($id)
    {
        $data["personal"] = $this->personal->where("idPersonal", $id)->first();
        $data["tipoespecialidad"] = $this->especialidad->findAll();
        $data["tipotrabajador"] = $this->tipopersonal->findAll();
        $data["tipodocumento"] = $this->tipodocumento->findAll();
        $data["contenido"] = "personalmedico/actualizar";
        $data["titulo"] = "Actualizar datos del Personal Medico";
        return view("index", $data);
    }

    public function obtenerPersonal($id)
    {
        $consulta = $this->personal->where('idPersonal', $id)->first();
        return json_encode(array("statusCode" => 200, "consulta" => $consulta));
    }


    public function actualizarDatos($id)
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {

            $id = $this->request->getPost("id_");

            $nombre =  $this->request->getPost("nombre");
            $apellidos =  $this->request->getPost("apellidos");
            $direccion =  $this->request->getPost("direccion");
            $celular =  $this->request->getPost("celular");
            $listGenero =  $this->request->getPost("listGenero");
            $nroDocumento =  $this->request->getPost("nroDocumento");
            $listStatus =  $this->request->getPost("listStatus");
            $edad =  $this->request->getPost("edad");
            $listEspecialidad =  $this->request->getPost("listEspecialidad");
            $listTipoPersonal =  $this->request->getPost("listTipoPersonal");
            $listDocumento =  $this->request->getPost("listDocumento");


            $data = [
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "direccion" => $direccion,
                "celular" => $celular,
                "genero" => $listGenero,
                "numeroDocumento" => $nroDocumento,
                "estado" => $listStatus,
                "fechaNac" => $edad,
                "idTipoEspecialidad" => $listEspecialidad,
                "idTipoTrabajador"  => $listTipoPersonal,
                "idTipoDocumento" => $listDocumento
            ];

            $this->personal->update($id, $data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos Actualizados correctamente");

            return redirect()->to(base_url() . "/personalmedico");
        } else {

            $data["personal"] = $this->personal->where("idPersonal", $id)->first();
            $data["tipoespecialidad"] = $this->especialidad->findAll();
            $data["tipotrabajador"] = $this->tipopersonal->findAll();
            $data["tipodocumento"] = $this->tipodocumento->findAll();
            $data["contenido"] = "personalmedico/actualizar";
            $data["validation"] = $this->validator;
            $data["titulo"] = "Actualizar datos del Personal Medico";
            return view("index", $data);
        }
    }


    public function eliminarRegistro($id)
    {
        try {

            $this->personal->where("idPersonal", $id);
            $this->personal->delete();
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos eliminados correctamente");
            return json_encode(array("statusCode" => 200));
        } catch (\Exception $e) {
            $this->session->setFlashdata("mensaje", "0");
            $this->session->setFlashdata("texto", "Error inesperado al momento de eliminar");
            return json_encode(array("statusCode" => 500));
        }
    }
}

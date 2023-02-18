<?php

namespace App\Controllers;

use App\Models\EspecialidadModel;

class Especialidad extends BaseController
{
    protected $especialidad;
    protected $validacion;
    protected $session;
    protected $rules_especialidad;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }

        $this->validacion = \Config\Services::validation();
        $this->especialidad = new EspecialidadModel();
    }

    public function index()
    {
        $data["tipoespecialidad"] = $this->especialidad->findAll();
        $data['contenido'] = 'especialidad/especialidad';
        $data["titulo"] = "Especialidades";

        return view('index', $data);
    }

    public function reglas()
    {
        $this->rules_especialidad = [
            "especialidad" => [
                "rules" => "required|is_unique[tipoespecialidad.nombre,tipoespecialidad.idTipoEspecialidad,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    'is_unique' => "Este trabajador ya esta registrado",
                ]
            ],
            "listStatus" => [
                "rules" => "in_list[1,2]",
                "errors" => [
                    "in_list" => "Valores no permitidos",
                ]
            ]
        ];

        return $this->rules_especialidad;
    }

    public function registrarDatos()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {
            $nombreEsp = $this->request->getPost("especialidad");
            $estado = $this->request->getPost("listStatus");

            $data = [
                "nombre" => $nombreEsp,
                "estado" =>  $estado
            ];
            $this->especialidad->save($data);

            $this->session->setFlashdata('mensaje', '1');
            $this->session->setFlashdata('texto', 'Datos registrados correctamente');
            return json_encode(array("statusCode" => 200));
        } else {
            return json_encode(array("statusCode" => 500, "errors" => $this->validacion->getErrors()));
        }
    }

    public function obtenerEspecialidad($id)
    {
        $consulta = $this->especialidad->where('idTipoEspecialidad', $id)->first();
        return json_encode(array("statusCode" => 200, "consulta" => $consulta));
    }

    public function actualizarDatos($id)
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {

            $id = $this->request->getPost("id_");

            $nombreEsp = $this->request->getPost("especialidad");
            $estado = $this->request->getPost("listStatus");


            $data = [
                "nombre" => $nombreEsp,
                "estado" =>  $estado
            ];

            $this->especialidad->update($id, $data);
            $this->session->setFlashdata('mensaje', '1');
            $this->session->setFlashdata('texto', 'Datos actualizados correctamente');
            return json_encode(array("statusCode" => 200));
        } else {
            return json_encode(array("statusCode" => 500, "errors" => $this->validacion->getErrors()));
        }
    }

    public function eliminarRegistro($id)
    {

        try {

            $this->especialidad->where('idTipoEspecialidad', $id);
            $this->especialidad->delete();
            $this->session->setFlashdata('mensaje', '1');
            $this->session->setFlashdata('texto', 'Datos eliminados correctamente');
            return redirect()->to(base_url() . '/Especialidad');
        } catch (\Exception $e) {
            $this->session->setFlashdata('mensaje', '0');
            $this->session->setFlashdata('texto', 'Dicha Especialidad ya tiene registros asociados');
            return redirect()->to(base_url() . '/Especialidad');
        }
    }
}

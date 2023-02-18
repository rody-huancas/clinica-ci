<?php

namespace App\Controllers;

use App\Models\TipoPersonalModel;

//Cambio hecho

class TipoPersonal extends BaseController
{
    protected $rules_tipoPer;
    protected $tipopersonal;
    protected $validacion;
    protected $session;

    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }

        $this->validacion = \Config\Services::validation();
        $this->tipopersonal = new TipoPersonalModel();
        $this->session = \Config\Services::session();

    }

    public function index()
    {
        $data["tipotrabajador"] = $this->tipopersonal->findAll();
        $data['contenido'] = 'tipopersonal/tipopersonal';
        $data["titulo"] = "Tipo Personal Medico";

        return view('index', $data);
    }

    public function reglas()
    {
        $this->rules_tipoPer = [
            "tipoPersonal" => [
                "rules" => "required|is_unique[tipotrabajador.nombreTrabajador,tipotrabajador.idTipoTrabajador,{id_}]",
                "errors" => [
                    "required" => "No se aceptan valores vacios.",
                    'is_unique' => "Este trabajador ya esta registrado",
                ]
            ]
        ];

        return $this->rules_tipoPer;
    }

   

    public function registrarDatos()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {
            
            $nombreTipo = $this->request->getPost("tipoPersonal");

            $data = [
                "nombreTrabajador" => $nombreTipo
            ];
            $this->tipopersonal->save($data);

            $this->session->setFlashdata('mensaje', '1');
            $this->session->setFlashdata('texto', 'Datos registrados correctamente');
            return json_encode(array("statusCode" => 200));
        } else {
            return json_encode(array("statusCode" => 500, "errors" => $this->validacion->getErrors()));
        }
    }

    public function obtenerTipoPersonal($id)
    {
        $consulta = $this->tipopersonal->where('idTipoTrabajador', $id)->first();
        return json_encode(array("statusCode" => 200, "consulta" => $consulta));
    }

    public function actualizarDatos($id)
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {
            
            $id = $this->request->getPost("id_");
            $nombreTipo = $this->request->getPost("tipoPersonal");

            $data = [
                "nombreTrabajador" => $nombreTipo
            ];

            $this->tipopersonal->update($id, $data);

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
            $this->tipopersonal->where('idTipoTrabajador', $id);
            $this->tipopersonal->delete();
            $this->session->setFlashdata('mensaje', '1');
            $this->session->setFlashdata('texto', 'Datos eliminados correctamente');
            return redirect()->to(base_url() . '/TipoPersonal');
        } catch (\Exception $e) {
            $this->session->setFlashdata('mensaje','0');
            $this->session->setFlashdata('texto','Dicho Tipo Personal ya tiene registros asociados');
            return redirect()->to(base_url().'/TipoPersonal');
        }
    }
}

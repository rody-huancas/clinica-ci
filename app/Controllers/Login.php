<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
    protected $usuario;
    protected $validacion;
    protected $session;
    protected $reglas_log;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usuario = new UsuarioModel();
    }

    public function index()
    {
        $data['titulo'] = 'Inicia sesión';

        return view('login/login', $data);
    }

    public function reglas()
    {
        $this->reglas_log = [
            "txt_usuario" => [
                "rules" => "required|max_length[60]",
                "errors" => [
                    "required" => "Usuario requerido",
                    "max_length" => "Cant. máxima de caracteres: [60]",
                ]
            ],
            "password" => [
                "rules" => "required|min_length[5]|max_length[12]",
                "errors" => [
                    "required" => "Contraseña requerida",
                    "max_length" => "Cant. máxima de caracteres: [12]",
                    "min_length" => "Cant. mínima de caracteres: [6]"
                ]
            ]
        ];

        return $this->reglas_log;
    }

    public function validacion_do()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas())) {

            $usuario = $this->request->getPost("txt_usuario");
            $password = $this->request->getPost("password");
            $password = hash("SHA256", $password);


            $query = $this->usuario->where('nameUser', $usuario)->where('password', $password)->first();
            if (isset($query) && $query["estado"] == 1) {
                $data = [
                    "idUsuario"         => $query["idUsuario"],
                    "nombreCompleto"    => $query["nombre"] . " " . $query["apellidos"],
                    "estado"            => $query["estado"],
                    "rol"               => $query["nombreRol"],
                    "loggin_in"         => "1"
                ];
                $this->session->set($data);

                return redirect()->to(base_url() . "/Inicio")->with("msj_login", "Acceso concedido");
            } else if (isset($query) && $query["estado"] == 2) {
                return redirect()->to(base_url() . "/Login")->with("msj_login", "<p style='color:red;'> USUARIO INACTIVO </p> ");
            } else {
                return redirect()->to(base_url() . "/Login")->with("msj_login", "<p style='color:red;'> USUARIO NO REGISTRADO </p> ");
            }
        } else {
            $data["validation"] = $this->validator;
            $data["titulo"] = "Inicio de sesión";
            return view('login/login', $data);
        }
    }

    public function logaut()
    {
        $this->session->destroy();
        return redirect()->to(base_url() . '/login');
    }
}

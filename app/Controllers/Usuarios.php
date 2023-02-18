<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    protected $usuario;
    protected $session;


    public function __construct()
    {
        if (empty(session('loggin_in'))) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        $this->usuario = new UsuarioModel();
        $this->session = \Config\Services::session();

    }

    public function index()
    {
        $data['titulo'] = "Usuarios";
        $data['contenido'] = 'usuarios/usuarios';
        $data["usuario"] = $this->usuario->findAll();
        return view('index', $data);
    }

    public function registrar()
    {
        $data["usuario"] = $this->usuario->findAll();
        $data["titulo"] = "Registrar Nuevo Usuario";
        $data["contenido"] = "usuarios/registrar";
        $data["usuario"] = $this->usuario->findAll();
        return view("index", $data);
    }

    // Registrar datos
    public function registrarDatos()
    {
        if ($this->request->getMethod() == "post") {

            $txtNombre = $this->request->getPost("nombre");
            $txtApellidos = $this->request->getPost("apellidos");
            $txtCiudad = $this->request->getPost("ciudad");
            $txtDireccion = $this->request->getPost("direccion");
            $txtGenero = $this->request->getPost("listGenero");
            $txtEdad = $this->request->getPost("fecha");
            $txtCelular = $this->request->getPost("celular");
            $txtDocumento = $this->request->getPost("listDocumento");
            $txtNroDocumento = $this->request->getPost("nroDocumento");
            $txtNombreUsuario = $this->request->getPost("nombreUsuario");
            //$txtPassword = $this->request->getPost("password");
            $txtRol = $this->request->getPost("listRol");
            $txtEstado = $this->request->getPost("listStatus");
            
            $txtPassword =  empty($_POST['password']) ? "" : hash("SHA256",$_POST['password']);

            $data = [
                "nombre" => $txtNombre,
                "apellidos" => $txtApellidos,
                "ciudad" => $txtCiudad,
                "direccion" => $txtDireccion,
                "celular" => $txtCelular,
                "genero" => $txtGenero,
                "fechaNac" => $txtEdad,
                "nombreDocumento" => $txtDocumento,
                "numeroDocumento" => $txtNroDocumento,
                "nombreUsuario" => $txtNombreUsuario,
                "password" => $txtPassword,
                "rol" => $txtRol,
                "status" => $txtEstado
            ];

            
            $this->usuario->save($data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos Registrados Correctamente");

            return redirect()->to(base_url() . "/usuarios");
        } else {
            $data["contenido"] = "usuarios/registrar";
            return view("index", $data);
        }
    }

    public function verRegistro($id)
    {
        $data["usuario"] = $this->usuario->where('idUsuario', $id)->first();
        $data["contenido"] = "usuarios/actualizar";
        $data["titulo"] = "Actualizar Usuario";
        return view("index", $data);
    }

    // Actualizar Usuario
    public function actualizarDatos($id)
    {
        if ($this->request->getMethod() == "post") {

            $id = $this->request->getPost("id_");
            $txtNombre = $this->request->getPost("nombre");
            $txtApellidos = $this->request->getPost("apellidos");
            $txtCiudad = $this->request->getPost("ciudad");
            $txtDireccion = $this->request->getPost("direccion");
            $txtGenero = $this->request->getPost("listGenero");
            $txtCelular = $this->request->getPost("celular");
            $txtFecha = $this->request->getPost("fecha");
            $txtNombreUsuario = $this->request->getPost("nombreUsuario");
            $txtPassword = $this->request->getPost("password");
            $txtRol = $this->request->getPost("listRol");
            $txtEstado = $this->request->getPost("listStatus");


            $data = [
                "nombre" => $txtNombre,
                "apellidos" => $txtApellidos,
                "ciudad" => $txtCiudad,
                "direccion" => $txtDireccion,
                "genero" => $txtGenero,
                "celular" => $txtCelular,
                "fechaNac" => $txtFecha,
                "nameUser" => $txtNombreUsuario,
                "password" => hash("SHA256",$txtPassword),
                "nombreRol" => $txtRol,
                "estado" => $txtEstado
            ];
            $this->usuario->update($id, $data);
            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos actualizados correctamente");

            return redirect()->to(base_url() . "/usuarios");
        } else {
            $data["usuario"] = $this->usuario->where('idUsuario', $id)->first();
            $data["contenido"] = "usuarios/actualizar";
            $data["titulo"] = "Actualizar Usuario";
            return view("index", $data);
        }
    }

    // Eliminar datos
    public function eliminarRegistro($id)
    {
        try {
            $this->usuario->where("idUsuario", $id);
            $this->usuario->delete();

            $this->session->setFlashdata("mensaje", "1");
            $this->session->setFlashdata("texto", "Datos Eliminados Correctamente");

            return redirect()->to(base_url() . "/usuarios");
        } catch (\Exception $e) {
            $this->session->setFlashdata("mensaje", "0");
            $this->session->setFlashdata("texto", "Error al eliminar");

            return redirect()->to(base_url() . "/usuarios");
        }
    }
}

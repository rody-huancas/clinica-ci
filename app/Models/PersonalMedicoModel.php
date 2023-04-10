<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalMedicoModel extends Model
{

    protected $table      = 'personal';
    protected $primaryKey = 'idPersonal';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'apellidos', 'direccion', 'celular', 'genero', 'numeroDocumento', 'estado', 'fechaNac', 'idTipoEspecialidad', 'idTipoTrabajador', 'idTipoDocumento'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPersonal()
    {
        $this->select("
                        personal.idPersonal,
                        personal.nombre,
                        personal.apellidos,
                        personal.direccion,
                        personal.celular,
                        personal.genero,
                        personal.numeroDocumento,
                        personal.estado,
                        personal.fechaNac,
                        personal.idTipoEspecialidad,
                        personal.idTipoDocumento,
                        personal.idTipoTrabajador,
                        tipoespecialidad.nombre as especialidad,
                        tipodocumento.NombreDocumento,
                        tipotrabajador.nombreTrabajador,      
        ");
        $this->join("tipoespecialidad", "tipoespecialidad.idTipoEspecialidad = personal.idTipoEspecialidad");
        $this->join("tipodocumento", "tipodocumento.idTipoDocumento = personal.idTipoDocumento");
        $this->join("tipotrabajador", "tipotrabajador.idTipoTrabajador = personal.idTipoTrabajador");
        $this->where("personal.idPersonal >", 1);

        $query = $this->findAll();
        return $query;
    }

    public function cantPersonalMedico()
    {
        $this->select("count(idPersonal) as cant");
        //$this->where('usuario.estad != ',0);
        $query = $this->first();
        return $query['cant'];
    }

    public function getBusqueda($value)
    {
        $this->select("personal.idPersonal,
                         concat_ws(' ', personal.nombre,personal.apellidos) as medico,
                         tipoespecialidad.nombre");

        $this->join("tipoespecialidad", "tipoespecialidad.idTipoEspecialidad = personal.idTipoEspecialidad");


        // $this->where("personal.idPersonal >", 1);
        $this->like("personal.apellidos", $value);

        // $this->orLike("persona.apellidos", $value);
        // $this->orLike("persona.numeroDocumento", $value);
        $query = $this->findAll();
        return $query;

        /**
         * SELECT * FROM cliente
  INNER JOIN persona ON persona.id_persona = cliente.id_persona
  WHERE persona.nombre LIKE '%a%'  or persona.apellidos LIKE '%a%' or persona.numeroDocumento LIKE '%2%'
         */
    }

    public function getResultadosID($idPersonal)
    {
        $this->select("
                        personal.idPersonal,
                        personal.nombre,
                        personal.apellidos,
                        personal.direccion,
                        personal.celular,
                        personal.genero,
                        personal.numeroDocumento,
                        personal.estado,
                        personal.fechaNac,
                        personal.idTipoEspecialidad,
                        personal.idTipoDocumento,
                        personal.idTipoTrabajador,
                        tipoespecialidad.nombre as especialidad,
                        tipodocumento.NombreDocumento,
                        tipotrabajador.nombreTrabajador,      
        ");
        $this->join("tipoespecialidad", "tipoespecialidad.idTipoEspecialidad= personal.idTipoEspecialidad");
        $this->join("tipodocumento", "tipodocumento.idTipoDocumento = personal.idTipoDocumento");
        $this->join("tipotrabajador", "tipotrabajador.idTipoTrabajador = personal.idTipoTrabajador");
        $this->where("personal.idPersonal", $idPersonal);
        $query = $this->first();
        return $query;
    }
}

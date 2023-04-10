<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriaClinicaModel extends Model
{

    protected $table      = 'historiaclinica';
    protected $primaryKey = 'idhistoria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'codigohistoria',
        'nombres',
        'apellidos',
        'telefonoPaciente',
        'edad',
        'fechaNac',
        'distrito',
        'departamento',
        'direccion',
        'fechaCreacion',
        'provincia',
        'horaCreacion',
        'parentezco',
        'telefono',
        'dni',
        'dnifamiliar',
        'idPersonal',
        'motivo',
        'origen'
    ];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function getResultados()
    {
        $this->select("
            historiaclinica.idhistoria,
            historiaclinica.codigohistoria,
            historiaclinica.nombres,
            historiaclinica.apellidos,
            historiaclinica.telefonoPaciente,
            historiaclinica.edad,
            historiaclinica.fechaNac,
            historiaclinica.distrito,
            historiaclinica.departamento,
            historiaclinica.direccion,
            historiaclinica.fechaCreacion,
            historiaclinica.provincia,
            historiaclinica.horaCreacion,
            historiaclinica.parentezco,
            historiaclinica.telefono,
            historiaclinica.dni,
            historiaclinica.dnifamiliar,
            historiaclinica.idPersonal,
            historiaclinica.motivo,
            historiaclinica.origen,
            concat_ws(' ', personal.nombre,personal.apellidos) as nombreMedico,
            tipoespecialidad.nombre as nombreEspecialidad
        ");
        $this->join('personal', 'historiaclinica.idPersonal = personal.idPersonal');
        $this->join('tipoespecialidad', 'personal.idTipoEspecialidad = tipoespecialidad.idTipoEspecialidad');
        $this->where('historiaclinica.idhistoria >', 1);
        $query = $this->findAll();
        return $query;
    }


    public function getResultado($id)
    {
        $this->select("
            historiaclinica.idhistoria,
            historiaclinica.codigohistoria,
            historiaclinica.nombres,
            historiaclinica.apellidos,
            historiaclinica.telefonoPaciente,
            historiaclinica.edad,
            historiaclinica.fechaNac,
            historiaclinica.distrito,
            historiaclinica.departamento,
            historiaclinica.direccion,
            historiaclinica.fechaCreacion,
            historiaclinica.provincia,
            historiaclinica.horaCreacion,
            historiaclinica.parentezco,
            historiaclinica.telefono,
            historiaclinica.dni,
            historiaclinica.dnifamiliar,
            historiaclinica.idPersonal,
            historiaclinica.motivo,
            historiaclinica.origen,
            concat_ws(' ', personal.nombre,personal.apellidos) as nombreMedico,
            tipoespecialidad.nombre as nombreEspecialidad
        ");
        $this->join('personal', 'historiaclinica.idPersonal = personal.idPersonal');
        $this->join('tipoespecialidad', 'personal.idTipoEspecialidad = tipoespecialidad.idTipoEspecialidad');
        $this->where('historiaclinica.idhistoria', $id);
        $query = $this->first();
        return $query;
    }

    public function getBusqueda($value)
    {
        $this->select("historiaclinica.idhistoria,
                       concat_ws(' ', historiaclinica.nombres, historiaclinica.apellidos) as paciente,
                       personal.nombre,
                       historiaclinica.motivo,
                       historiaclinica.dni");

        $this->join("personal", "personal.idPersonal = historiaclinica.idPersonal");
        $this->where("historiaclinica.idhistoria >", 1);
        $this->groupStart();
        $this->like("historiaclinica.nombres", $value);
        $this->orLike("historiaclinica.apellidos", $value);
        $this->orLike("historiaclinica.dni", $value);
        $this->groupEnd();
        $query = $this->findAll();
        return $query;
    }

    public function getResultadosID($idhistoria)
    {
        $this->select("
            historiaclinica.idhistoria,
            historiaclinica.codigohistoria,
            historiaclinica.nombres,
            historiaclinica.apellidos,
            historiaclinica.telefonoPaciente,
            historiaclinica.edad,
            historiaclinica.fechaNac,
            historiaclinica.distrito,
            historiaclinica.departamento,
            historiaclinica.direccion,
            historiaclinica.fechaCreacion,
            historiaclinica.provincia,
            historiaclinica.horaCreacion,
            historiaclinica.parentezco,
            historiaclinica.telefono,
            historiaclinica.dni,
            historiaclinica.dnifamiliar,
            historiaclinica.idPersonal,
            historiaclinica.motivo,
            historiaclinica.origen,
            concat_ws(' ', personal.nombre,personal.apellidos) as nombreMedico,
            tipoespecialidad.nombre as nombreEspecialidad
        ");
        $this->join('personal', 'historiaclinica.idPersonal = personal.idPersonal');
        $this->join('tipoespecialidad', 'personal.idTipoEspecialidad = tipoespecialidad.idTipoEspecialidad');
        $this->where('historiaclinica.idhistoria', $idhistoria);
        $query = $this->first();
        return $query;
    }


    public function cantHistoriaClinica()
    {
        $this->select("count(idhistoria) as cant");
        $query = $this->first();
        return $query['cant'];
    }
}

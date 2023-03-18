<?php

namespace App\Models;

use CodeIgniter\Model;

class CajaModel extends Model
{

    protected $table      = 'caja';
    protected $primaryKey = 'idCaja';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'idhistoria',
        'referido',
        'comentario',
        'gestion',
        'ingreso',
        'egreso_one',
        'egreso_two',
        'total',
        'fecha_creacion',
        'hora_creacion',
    ];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getCaja()
    {
        $this->select("
            caja.idCaja,
            caja.gestion,
            caja.referido,
            caja.ingreso,
            caja.egreso_one,
            caja.egreso_two,
            caja.comentario,
            caja.total,
            caja.idhistoria,
            historiaclinica.codigohistoria,
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
            concat_ws(' ', historiaclinica.nombres,historiaclinica.apellidos) as nombrePaciente,
            concat_ws(' ', personal.nombre,personal.apellidos) as nombreMedico,
            tipoespecialidad.nombre as nombreEspecialidad
        ");
        $this->join('historiaclinica', 'historiaclinica.idhistoria = caja.idhistoria');
        $this->join('personal', 'historiaclinica.idPersonal = personal.idPersonal');
        $this->join('tipoespecialidad', 'personal.idTipoEspecialidad = tipoespecialidad.idTipoEspecialidad');
        $query = $this->findAll();
        return $query;
    }

    public function getResultado($id)
    {
        $this->select("
            caja.idCaja,
            caja.idhistoria,
            caja.gestion,
            caja.referido,
            caja.ingreso,
            caja.egreso_one,
            caja.egreso_two,
            caja.comentario,
            caja.total,
            historiaclinica.codigohistoria,
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
            concat_ws(' ', historiaclinica.nombres,historiaclinica.apellidos) as nombrePaciente,
            concat_ws(' ', personal.nombre,personal.apellidos) as nombreMedico,
            tipoespecialidad.nombre as nombreEspecialidad
        ");
        $this->join('historiaclinica', 'historiaclinica.idhistoria = caja.idhistoria');
        $this->join('personal', 'historiaclinica.idPersonal = personal.idPersonal');
        $this->join('tipoespecialidad', 'personal.idTipoEspecialidad = tipoespecialidad.idTipoEspecialidad');
        $this->where('caja.idCaja', $id);

        $query = $this->first();
        return $query;
    }
}

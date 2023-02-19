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
        'direccion',
        'fechaCreacion',
        'provincia',
        'horaCreacion',
        'parentezco',
        'telefono',
        'dni',
        'dnifamiliar',
        'idPersonal',
        'motivo'
    ];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

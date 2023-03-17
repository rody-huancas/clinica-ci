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
}

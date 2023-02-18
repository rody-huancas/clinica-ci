<?php

namespace App\Models;

use CodeIgniter\Model;

class EspecialidadModel extends Model
{

    protected $table      = 'tipoespecialidad';
    protected $primaryKey = 'idTipoEspecialidad';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre','estado'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
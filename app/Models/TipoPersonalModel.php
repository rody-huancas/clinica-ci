<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoPersonalModel extends Model
{

    protected $table      = 'tipotrabajador';
    protected $primaryKey = 'idTipoTrabajador';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombreTrabajador'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
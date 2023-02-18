<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoDocumentoModel extends Model
{

    protected $table      = 'tipodocumento';
    protected $primaryKey = 'idTipoDocumento';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['NombreDocumento'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}



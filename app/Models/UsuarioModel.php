<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table      = 'usuario';
    protected $primaryKey = 'idUsuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre',
        'apellidos',
        'ciudad',
        'direccion',
        'genero',
        'celular',
        'fechaNac',
        'nameUser',
        'password',
        'nombreRol',
        'estado'
    ];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function cantUsuarios(){
        $this->select("count(idUsuario) as cant");
        //$this->where('usuario.estad != ',0);
        $query = $this->first();
        return $query['cant'];
      }

   
}

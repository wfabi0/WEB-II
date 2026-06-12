<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipioModel extends Model
{
    protected $table      = 'municipios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'ufid', 'nome'];

    protected $useTimestamps = false;

    public function getCidadesByEstado($ufid)
    {
        return $this->where('ufid', $ufid)->orderBy('nome', 'ASC')->findAll();
    }

    public function getCidadeById($id)
    {
        return $this->find($id);
    }
}
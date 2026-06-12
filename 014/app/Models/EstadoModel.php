<?php
namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $table          = 'estados'; // <-- AQUI: Mude de 'ufs' para 'estados'
    protected $primaryKey     = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id', 'nome', 'sigla'];
    protected $useTimestamps    = false;

    public function getAllEstados()
    {
        return $this->orderBy('nome', 'ASC')->findAll();
    }

    public function getEstadoById($id)
    {
        return $this->find($id);
    }
}

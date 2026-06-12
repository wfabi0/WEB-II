<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table            = 'clientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // As colunas exatas da sua tabela SQL
    protected $allowedFields    = ['nome', 'cpf', 'estado_id', 'cidade_id'];

    protected $validationRules  = [
        'id' => 'permit_empty|is_natural_no_zero', 
        'nome'      => 'required',
        'cpf'       => 'required|is_unique[clientes.cpf,id,{id}]',
        'estado_id' => 'required',
        'cidade_id' => 'required'
    ];

    public function getAllClientes()
    {
        // Faz o JOIN para pegar o nome da cidade e do estado para a view
        return $this->select('clientes.*, estados.nome as estado_nome, municipios.nome as cidade_nome')
                    ->join('estados', 'estados.id = clientes.estado_id', 'left')
                    ->join('municipios', 'municipios.id = clientes.cidade_id', 'left')
                    ->orderBy('clientes.id', 'DESC')
                    ->findAll();
    }
}

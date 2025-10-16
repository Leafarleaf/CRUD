<?php

namespace App\Models;

use CodeIgniter\Model;

class Motorista extends Model
{
    protected $table            = 'motoristas';
    protected $primaryKey       = 'cnh';
    protected $allowedFields    = ['cnh', 'nome', 'data_nascimento'];
    protected $useAutoIncrement = false;
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'modelo',
        'ano',
        'data_aquisicao',
        'km_aquisicao',
        'renavam',
        'placa',
    ];
}

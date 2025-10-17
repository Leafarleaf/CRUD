<?php

namespace App\Models;

use CodeIgniter\Model;

class MotoristaViagem extends Model
{
    protected $table = 'viagem_motoristas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['viagem_id', 'motorista_cnh'];

    protected $useTimestamps = false;
}

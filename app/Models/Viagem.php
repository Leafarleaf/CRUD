<?php

namespace App\Models;

use CodeIgniter\Model;

class Viagem extends Model

{
    protected $table = 'viagens';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'veiculo_id',
        'km_inicio',
        'km_fim',
        'data_inicio',
        'data_fim',
        'finalizada',
    ];
    protected $useTimestamps = false;
}

// * CRUD de Viagens
//   * Escolher os motoristas da viagem
//   * Escolher o veículo da viagem
//   * KM Inicial do veículo no início da viagem
//   * KM Final do veículo ao finalizar a viagem
//   * Data e hora inicial da viagem
//   * Data e hora de chegada.
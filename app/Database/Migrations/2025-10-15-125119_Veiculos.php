<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Veiculos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'modelo' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'ano' => [
                'type'       => 'SMALLINT',
                'constraint' => 4,
                'unsigned'   => true,
            ],
            'data_aquisicao' => [
                'type' => 'DATE',
            ],
            'km_aquisicao' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'renavam' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'unique'     => true,
            ],
            'placa' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'unique'     => true,
            ],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('veiculos');
    }

    public function down()
    {
        $this->forge->dropTable('veiculos');
    }
}
// * CRUD de Veículos
//   * Modelo
//   * Ano
//   * Data de aquisição
//   * KMs rodados no momento da aquisição
//   * Renavam - Deve ser único
//   * Placa - Deve ser único
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Viagens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'SERIAL',
                'auto_increment' => true
            ],
            'motorista_cnh' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ],
            'veiculo_id' => [
                'type' => 'INT',
            ],
            'km_inicio' => [
                'type' => 'INT',
            ],
            'km_fim' => [
                'type' => 'INT',
                'null' => true,
            ],
            'data_inicio' => [
                'type' => 'TIMESTAMP',
            ],
            'data_fim' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'finalizada' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('viagens');
    }

    public function down()
    {
        $this->forge->dropTable('viagens');
    }
}

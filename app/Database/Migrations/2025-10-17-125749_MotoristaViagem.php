<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MotoristaViagem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'viagem_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'motorista_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->addForeignKey('viagem_id', 'viagens', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('motorista_id', 'motoristas', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('viagem_motoristas');
    }

    public function down()
    {
        $this->forge->dropTable('viagem_motoristas');
    }
}

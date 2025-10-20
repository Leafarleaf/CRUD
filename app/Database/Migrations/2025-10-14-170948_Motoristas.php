<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMotoristasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
                'unique'         => true,
            ],
            'cnh' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
                'unique'     => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'data_nascimento' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('motoristas');
    }

    public function down()
    {
        $this->forge->dropTable('motoristas');
    }
}

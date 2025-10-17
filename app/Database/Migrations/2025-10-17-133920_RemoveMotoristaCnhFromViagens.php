<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveMotoristaCnhFromViagens extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('viagens', 'motorista_cnh');
    }

    public function down()
    {
        $this->forge->addColumn('viagens', [
            'motorista_cnh' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
        ]);
    }
}
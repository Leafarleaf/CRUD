<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMotoristasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cnh' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'data_nascimento' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('cnh', true); // primary key
        $this->forge->createTable('motoristas');
    }

    public function down()
    {
        $this->forge->dropTable('motoristas');
    }
}
// * CRUD de Motoristas
//   * Nome 
//   * Data de nascimento - ter no minímo, 18 anos
//   * N° da CNH.

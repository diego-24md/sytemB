<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGruposTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idgrupo'  => ['type' => 'INT', 'auto_increment' => true],
            'grado'    => ['type' => 'VARCHAR', 'constraint' => 20],
            'seccion'  => ['type' => 'VARCHAR', 'constraint' => 5],
        ]);

        $this->forge->addPrimaryKey('idgrupo');
        $this->forge->createTable('grupos', true);
    }

    public function down()
    {
        $this->forge->dropTable('grupos');
    }
}
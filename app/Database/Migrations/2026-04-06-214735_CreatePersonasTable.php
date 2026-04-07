<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpersona' => ['type' => 'INT', 'auto_increment' => true],
            'apellidos'  => ['type' => 'VARCHAR', 'constraint' => 150],
            'nombres'    => ['type' => 'VARCHAR', 'constraint' => 150],
            'tipodoc'    => ['type' => 'VARCHAR', 'constraint' => 20],
            'numdoc'     => ['type' => 'VARCHAR', 'constraint' => 15],
            'telefono'   => ['type' => 'VARCHAR', 'constraint' => 9],
        ]);

        $this->forge->addPrimaryKey('idpersona');
        $this->forge->createTable('personas');
    }

    public function down()
    {
        $this->forge->dropTable('personas');
    }
}
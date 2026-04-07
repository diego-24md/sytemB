<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRecursosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idrecurso'      => ['type' => 'INT', 'auto_increment' => true],
            'idtiporecurso'  => ['type' => 'INT'],
            'idsubcategoria' => ['type' => 'INT'],
            'titulo'         => ['type' => 'VARCHAR', 'constraint' => 200],
            'isbn'           => ['type' => 'VARCHAR', 'constraint' => 20],
            'anio'           => ['type' => 'YEAR'],
            'portada'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'numpaginas'     => ['type' => 'INT'],
        ]);

        $this->forge->addPrimaryKey('idrecurso');
        $this->forge->createTable('recursos');
    }

    public function down()
    {
        $this->forge->dropTable('recursos');
    }
}
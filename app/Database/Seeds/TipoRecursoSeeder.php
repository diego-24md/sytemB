<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoRecursoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['tipo' => 'Libro'],
            ['tipo' => 'Revista'],
            ['tipo' => 'Tesis'],
        ];

        $this->db->table('tiporecurso')->insertBatch($data);
    }
}
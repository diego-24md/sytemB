<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GruposSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['grado' => '1°', 'seccion' => 'A'],
            ['grado' => '1°', 'seccion' => 'B'],
            ['grado' => '1°', 'seccion' => 'C'],
            ['grado' => '2°', 'seccion' => 'A'],
            ['grado' => '2°', 'seccion' => 'B'],
            ['grado' => '2°', 'seccion' => 'C'],
            ['grado' => '3°', 'seccion' => 'A'],
            ['grado' => '3°', 'seccion' => 'B'],
            ['grado' => '3°', 'seccion' => 'C'],
            ['grado' => '4°', 'seccion' => 'A'],
            ['grado' => '4°', 'seccion' => 'B'],
            ['grado' => '4°', 'seccion' => 'C'],
            ['grado' => '5°', 'seccion' => 'A'],
            ['grado' => '5°', 'seccion' => 'B'],
            ['grado' => '5°', 'seccion' => 'C'],
        ];

        $this->db->table('grupos')->insertBatch($data);
    }
}
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RecursosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Cien años de soledad',
                'isbn' => '9780307474728',
                'anio' => 1967,
                'portada' => null,
                'numpaginas' => 417
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Don Quijote de la Mancha',
                'isbn' => '9788491050293',
                'anio' => 1605,
                'portada' => null,
                'numpaginas' => 863
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'El principito',
                'isbn' => '9780156012195',
                'anio' => 1943,
                'portada' => null,
                'numpaginas' => 96
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => '1984',
                'isbn' => '9780451524935',
                'anio' => 1949,
                'portada' => null,
                'numpaginas' => 328
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Fahrenheit 451',
                'isbn' => '9781451673319',
                'anio' => 1953,
                'portada' => null,
                'numpaginas' => 249
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Crimen y castigo',
                'isbn' => '9780143058144',
                'anio' => 1866,
                'portada' => null,
                'numpaginas' => 671
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Orgullo y prejuicio',
                'isbn' => '9780141439518',
                'anio' => 1813,
                'portada' => null,
                'numpaginas' => 432
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'El hobbit',
                'isbn' => '9780547928227',
                'anio' => 1937,
                'portada' => null,
                'numpaginas' => 310
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'La metamorfosis',
                'isbn' => '9788491050361',
                'anio' => 1915,
                'portada' => null,
                'numpaginas' => 201
            ],
            [
                'idtiporecurso' => 1,
                'idsubcategoria' => 1,
                'titulo' => 'Rayuela',
                'isbn' => '9788437604947',
                'anio' => 1963,
                'portada' => null,
                'numpaginas' => 736
            ]
        ];

        $this->db->table('recursos')->insertBatch($data);
    }
}
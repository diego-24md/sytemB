<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Libros extends Controller
{
    public function buscador()
    {
        return view('biblioteca/buscador');
    }

    public function buscar()
    {
        $db = \Config\Database::connect();
        $q = $this->request->getGet('q');

        $builder = $db->table('recursos');
        $builder->like('titulo', $q);

        return $this->response->setJSON($builder->get()->getResult());
    }

    public function detalle($id)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('recursos r');
        $builder->select('r.*, c.categoria, s.subcategoria');
        $builder->join('subcategorias s', 's.idsubcategoria = r.idsubcategoria');
        $builder->join('categorias c', 'c.idcategoria = s.idcategoria');
        $builder->where('r.idrecurso', $id);

        $data['libro'] = $builder->get()->getRow();

        return view('detalle_libro', $data);
    }

    public function reservar()
    {
        $db = \Config\Database::connect();

        $db->table('prestamos')->insert([
            'idactivo' => $this->request->getPost('idactivo'),
            'idusuario' => 1, // luego lo haces dinámico
            'entrega' => date('Y-m-d'),
            'condicionentrega' => 'reservado'
        ]);

        return redirect()->back()->with('msg', 'Reservado');
    }
}
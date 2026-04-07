<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\GrupoModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Persona extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();

        $personas = $db->table('personas p')
            ->select('p.*, g.grado, g.seccion')
            ->join('grupos g', 'g.idgrupo = p.idgrupo', 'left')
            ->get()
            ->getResultArray();

        $grupoModel = new GrupoModel();
        $data = [
            'personas' => $personas,
            'grupos'   => $grupoModel->findAll(),
            'header'   => view('Partials/header'),
            'footer'   => view('Partials/footer'),
        ];
        return view('Alumnos/index', $data);
    }

    public function importar()
    {
        $archivo  = $this->request->getFile('archivo_excel');
        $idgrupo  = $this->request->getPost('idgrupo');

        if (!$archivo->isValid()) {
            return redirect()->to(base_url('alumnos'))->with('error', 'Archivo inválido');
        }

        $archivo->move(WRITEPATH . 'uploads');
        $ruta = WRITEPATH . 'uploads/' . $archivo->getName();

        $spreadsheet = IOFactory::load($ruta);
        $hoja        = $spreadsheet->getActiveSheet();
        $filas       = $hoja->toArray();

        $model = new PersonaModel();

        foreach ($filas as $i => $fila) {
            if ($i === 0) continue;

            $model->save([
                'apellidos' => $fila[0],
                'nombres'   => $fila[1],
                'tipodoc'   => $fila[2],
                'numdoc'    => $fila[3],
                'telefono'  => $fila[4],
                'idgrupo'   => $idgrupo,
            ]);
        }

        return redirect()->to(base_url('alumnos'))->with('success', 'Alumnos cargados correctamente');
    }
}

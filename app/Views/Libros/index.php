<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Libros</h5>

    <a href="<?= base_url('libros/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>

    <table class="table mt-3" id="content-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>ISBN</th>
          <th>Año</th>
          <th>Páginas</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recursos as $recurso): ?>
          <tr>
            <td><?= $recurso['idrecurso'] ?></td>
            <td><?= $recurso['titulo'] ?></td>
            <td><?= $recurso['isbn'] ?></td>
            <td><?= $recurso['anio'] ?></td>
            <td><?= $recurso['numpaginas'] ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idrecurso="<?= $recurso['idrecurso'] ?>">Eliminar</a>
              <a href="#" class="btn btn-sm btn-info btn-editar" data-idrecurso="<?= $recurso['idrecurso'] ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>
<?= $footer ?>
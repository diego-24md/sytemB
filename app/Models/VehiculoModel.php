<?php

namespace App\Models;
use CodeIgniter\Model;

class VehiculoModel extends Model{

  protected $table = "vehiculos";
  protected $primaryKey = "id";
  protected $returnType = "array";
  protected $allowedFields = ["idmarca", "modelo", "anio", "color", "precio", "create_at", "update_at"];

  //Campos de auditoría => ¿cuándo se creó?, ¿cuándo se modificó?
  protected $useTimestamps = true;
  protected $createdField = "create_at"; //Campo Tabla Vehiculos
  protected $updatedField = "update_at"; //Campo Tabla Vehiculos

  //Métodos integrados:
  //findAll()   : obtener todos los registros
  //find()      : obtener un registro
  //insert()    : agregar nuevo registro
  //delete()    : eliminación física registro
  //update()    : actualización

  //¿Y qué sucede si necesito un método personalizado? Ejemplo: CONSULTA MULTITABLA
  //QUERY BUILDER = Constructor de consultas
  public function obtenerVehiculos(){
    return $this->select("vehiculos.*, marcas.marca")
      ->join("marcas", "marcas.id = vehiculos.idmarca")
      ->findAll();
  }

  //En caso la consulta sea muy compleja, podemos escribir nuestro propio SQL
  public function obtenerVehiculosSQL(){
    $sql = "
    SELECT
      vehiculos.*,
      marcas.marca
      FROM vehiculos
      INNER JOIN marcas ON marcas.id = vehiculos.idmarca
    ";
    return $this->db->query($sql)->getResultArray();
  }

}
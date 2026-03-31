<?php

namespace App\Models;
use CodeIgniter\Model;

class MarcaModel extends Model{

  protected $table = "marcas";
  protected $primaryKey = "id";
  protected $returnType = "array";
  protected $allowedFields = ["marca"];

  //Auditoría
  protected $useTimestamps = true;
  protected $createdField = "created_at";
  protected $updatedField = "updated_at";

}
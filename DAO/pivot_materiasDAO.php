<?php

class pivotDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insert(PivotMateriasModel $model)
  {

    $sql = "INSERT INTO pivot_materias (prof_id, mat_id) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->prof_id);
    $stmt->bindValue(2, $model->mat_id);
    $stmt->execute();
  }
}

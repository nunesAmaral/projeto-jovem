<?php
include_once 'model/model.php';
class PivotMateriasModel extends Model
{
  public $prof_id, $mat_id;
  public function save(?array $materias)
  {
    include_once 'DAO/pivot_materiasDAO.php';
    $dao = new pivotDAO($this->conn);
    foreach ($materias as $item) {
      $this->mat_id = (int) $item;
      $dao->insert($this);
    }
  }
  public function update(?array $materias)
  {
    include_once 'DAO/pivot_materiasDAO.php';
    $dao = new pivotDAO($this->conn);
    foreach ($materias as $item) {
      $this->mat_id = (int) $item;
      $dao->update($this);
    }
  }
  public function delete(?array $materias)
  {
    include_once 'DAO/pivot_materiasDAO.php';
    $dao = new pivotDAO($this->conn);
    foreach ($materias as $item) {
      $this->mat_id = (int) $item;
      $dao->delete($this);
    }
  }
}

<?php
include_once 'model/model.php';

class ProjetoModel extends Model
{
  public $id, $titulo, $descricao, $data_projeto, $laboratorio;
  public $rows;

  public function save()
  {
    include 'DAO/projetoDAO.php';
    $projetoDAO = new ProjetoDAO($this->conn);
    return $projetoDAO->insert($this);
  }

  public function getAllRows()
  {
    include 'DAO/projetoDAO.php';
    $dao = new ProjetoDAO($this->conn);
    $this->rows = $dao->select();
    $this->formatDate();
    $this->defineLabs();
  }
  public function formatDate()
  {
    foreach ($this->rows as $row) {
      $dateTimestamp = strtotime($row->data_projeto);
      $newFormat = date("d/m/Y", $dateTimestamp);
      $row->data_projeto = $newFormat;
    }
  }
  public function defineLabs()
  {
    foreach ($this->rows as $row) {
      switch ($row->laboratorio) {
        case '1':
          $row->laboratorio = 'Matemática';
          $row->lab_class = 'lab-matematica';
          break;
        case '2':
          $row->laboratorio = 'Ciências da Natureza';
          $row->lab_class = 'lab-natureza';
          break;
        case '3':
          $row->laboratorio = 'Ciências humanas';
          $row->lab_class = 'lab-humanas';
          break;
        case '4':
          $row->laboratorio = 'Linguagem';
          $row->lab_class = 'lab-linguagens';
          break;
      }
    }
  }
  public function getTotalRegistred()
  {
    return count($this->rows);
  }
}

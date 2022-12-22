<?php
include_once 'model/model.php';

class MateriaModel extends Model
{
  public $id, $nome;
  public $rows;
  public function getAllRows()
  {
    include_once 'DAO/materiaDAO.php';
    $dao = new MateriaDAO($this->conn);
    $this->rows = $dao->select();
  }
  public function getJoinedRows()
  {
    include_once 'DAO/materiaDAO.php';
    $dao = new MateriaDAO($this->conn);
    return $dao->selectJoinedRows();
  }
}

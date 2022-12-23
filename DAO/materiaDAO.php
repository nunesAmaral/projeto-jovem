<?php

class MateriaDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function select()
  {
    $sql = "SELECT * FROM materia";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  public function selectJoinedRows()
  {
    $sql = "SELECT nome, prof_id FROM materia JOIN pivot_materias ON pivot_materias.mat_id = materia.id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectByProfId(int $prof_id)
  {
    $sql = "SELECT id, prof_id FROM materia JOIN pivot_materias ON pivot_materias.mat_id = materia.id WHERE prof_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $prof_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

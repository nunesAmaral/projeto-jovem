<?php

class FormacadDAO
{
  private $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insert(FormacadModel $model)
  {
    $sql = "INSERT INTO form_academica (prof_id, formacao) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->prof_id);
    $stmt->bindValue(2, $model->formacao);
    $stmt->execute();
  }

  public function update(FormacadModel $model)
  {
    $sql = "UPDATE form_academica SET prof_id=?, formacao=?";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->prof_id);
    $stmt->bindValue(2, $model->formacao);
    $stmt->execute();
  }

  public function selectByReference(int $prof_id)
  {
    $sql = "SELECT * FROM form_academica WHERE prof_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $prof_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

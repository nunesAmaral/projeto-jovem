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
}

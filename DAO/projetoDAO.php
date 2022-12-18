<?php

class ProjetoDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insert(ProjetoModel $model)
  {

    $sql = "INSERT INTO projeto (titulo, descricao, data_projeto, laboratorio) 
            VALUES (?, ?, ?, ?,?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->titulo);
    $stmt->bindValue(2, $model->descricao);
    $stmt->bindValue(3, $model->data_projeto);
    $stmt->bindValue(4, $model->laboratorio);

    $stmt->execute();
    var_dump($this->conn->lastInsertId());

    return $this->conn->lastInsertId();
  }
  public function select()
  {
    $sql = "SELECT * FROM projeto";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

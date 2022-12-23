<?php

class professorDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insert(ProfessorModel $model)
  {

    $sql = "INSERT INTO professor (nome, img_perfil, email, descricao) 
            VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->img_perfil);
    $stmt->bindValue(3, $model->email);
    $stmt->bindValue(4, $model->descricao);

    $stmt->execute();

    return $this->conn->lastInsertId();
  }

  public function select()
  {
    $sql = "SELECT * FROM professor";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectById(int $id)
  {
    include_once 'model/professores_model.php';

    $sql = "SELECT * FROM professor WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    return $stmt->fetchObject("professorModel");
  }

  // public function update(ProjetoModel $model)
  // {
  //   $sql = "UPDATE projeto SET titulo=?, descricao=?, data_projeto=?, laboratorio=?
  //           WHERE id=?";
  //   $stmt = $this->conn->prepare($sql);

  //   $stmt->bindValue(1, $model->titulo);
  //   $stmt->bindValue(2, $model->descricao);
  //   $stmt->bindValue(3, $model->data_projeto);
  //   $stmt->bindValue(4, $model->laboratorio);
  //   $stmt->bindValue(5, $model->id);

  //   $stmt->execute();
  // }

  // public function delete(int $id)
  // {
  //   $sql = "DELETE FROM projeto WHERE id = ?";
  //   $stmt = $this->conn->prepare($sql);
  //   $stmt->bindValue(1, $id);

  //   $stmt->execute();
  //   return $stmt->fetchAll(PDO::FETCH_OBJ);
  // }
}

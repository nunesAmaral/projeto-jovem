<?php

class FormaturaDAO
{
  //A função construtora é usada toda a vez que a classe for instanciada. Os parâmetros correspondem aos atribuidos à função na instância.
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function select()
  {
    $sql = "SELECT * FROM formatura";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectById(int $id)
  {
    $sql = "SELECT * FROM formatura WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id);

    $stmt->execute();
    return $stmt->fetchObject();
  }



  public function insert(FormaturaModel $model)
  {
    $sql = "INSERT INTO formatura (descricao, ano_form) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $model->descricao);
    $stmt->bindValue(2, $model->ano);

    $stmt->execute();
    return $this->conn->lastInsertId();
  }

  public function update(FormaturaModel $model)
  {
    $sql = "UPDATE formatura SET descricao=?, ano_form=? WHERE id=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $model->descricao);
    $stmt->bindValue(2, $model->ano);
    $stmt->bindValue(3, $model->id);
    $stmt->execute();
  }
}

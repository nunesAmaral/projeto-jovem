<?php
class FormandoDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }
  public function insert(FormandoModel $model)
  {
    $sql = "INSERT INTO formando (nome, img, formatura_id, turma) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->img_perfil);
    $stmt->bindValue(3, $model->formatura_id);
    $stmt->bindValue(4, $model->turma);

    $stmt->execute();
  }

  public function update(FormandoModel $model)
  {
    $sql = "UPDATE formando SET nome=?, img=?, formatura_id=?, turma=? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->img_perfil);
    $stmt->bindValue(3, $model->formatura_id);
    $stmt->bindValue(4, $model->turma);
    $stmt->bindValue(5, $model->id);

    $stmt->execute();
  }

  public function selectByReference(int $id)
  {
    $sql = "SELECT * FROM formando WHERE formatura_id = ?";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $id);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

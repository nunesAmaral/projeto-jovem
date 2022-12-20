<?php
class ImgDAO
{
  private $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insert(ImgModel $model)
  {
    $sql = "INSERT INTO imagens (projeto_id, nome_img, extensao) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->projeto_id);
    $stmt->bindValue(2, $model->nome_imagem);
    $stmt->bindValue(3, $model->extensao);

    $stmt->execute();
  }

  public function select()
  {
    $sql = "SELECT * FROM imagens";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function delete(int $id)
  {
    $sql = "DELETE FROM imagens WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }

  public function selectById(int $id)
  {
    include_once 'model/img_model.php';

    $sql = "SELECT * FROM imagens WHERE projeto_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function deleteByReference(int $id)
  {
    include_once 'model/img_model.php';

    $sql = "DELETE FROM imagens WHERE projeto_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }
}

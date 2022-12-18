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
    $sql = "INSERT INTO imagens (projeto_id, nome_img) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, $model->projeto_id);
    $stmt->bindValue(2, $model->nome_imagem);

    $stmt->execute();
  }

  public function select()
  {
    $sql = "SELECT * FROM imagens";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

<?php

class ImgFormaturaDAO
{
  public $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function select()
  {
    $sql = "SELECT * FROM img_formatura";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function insert(FormaturaImgModel $model)
  {
    $sql = "INSERT INTO img_formatura (path, formatura_id) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $model->path);
    $stmt->bindValue(2, $model->formatura_id);

    $stmt->execute();
  }
}

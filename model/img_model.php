<?php

include_once 'model/model.php';
class ImgModel extends Model
{
  public $projeto_id, $nome_imagem;
  public $imagens;
  public $rows;

  public function saveFile($projeto_id)
  {
    if (isset($this->imagens) && count($this->imagens) > 0) {

      $this->projeto_id = $projeto_id;

      $path = "imgs/$this->projeto_id/";

      if (!file_exists($path)) {
        mkdir($path, 0755);
      }

      for ($i = 0; $i < count($this->imagens['name']); $i++) {
        $file_name = $this->imagens['name'][$i];
        $new_file_name = uniqid();
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($extension != "jpg" && $extension != "png") {
          echo $extension, $file_name;
          die("Tipo de arquivo inválido");
        }

        $this->nome_imagem = $new_file_name;
        $destination = "imgs/$this->projeto_id/$new_file_name.$extension";
        if (move_uploaded_file($this->imagens['tmp_name'][$i], $destination)) {
          $this->save();
        };
      }
    } else {
      die();
    }
  }
  public function save()
  {
    include_once 'DAO/imgDAO.php';
    $dao = new ImgDAO($this->conn);

    $dao->insert($this);
  }

  public function getAllRows()
  {
    include_once 'DAO/imgDAO.php';
    $dao = new ImgDAO($this->conn);

    $this->rows = $dao->select();
  }
}

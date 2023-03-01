<?php

class FormaturaImgModel extends Model
{
  public $path, $formatura_id;
  public $rows;

  public function save()
  {
    include_once 'DAO/imgFormaturaDAO.php';
    $dao = new ImgFormaturaDAO($this->conn);
    $dao->insert($this);
  }

  public function getAllRows()
  {
    include_once 'DAO/imgFormaturaDAO.php';
    $dao = new ImgFormaturaDAO($this->conn);
    $this->rows = $dao->select();
  }

  public function saveFile(?array $imagens)
  {
    if (isset($imagens) && count($imagens) > 0 && strlen($imagens['name'][0]) > 0) {

      $path = "imgs/formatura/$this->formatura_id/";

      if (!file_exists($path)) {
        mkdir($path, 0755);
      }

      for ($i = 0; $i < count($imagens['name']); $i++) {
        $file_name = $imagens['name'][$i];
        $new_file_name = uniqid();
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
          die("Tipo de arquivo inválido");
        }

        $destination = "imgs/formatura/$this->formatura_id/$new_file_name.$extension";

        $this->path = $destination;

        if (move_uploaded_file($imagens['tmp_name'][$i], $destination)) {
          $this->save();
        };
      }
    } else {
      die('erro ao salvar img');
    }
  }
}

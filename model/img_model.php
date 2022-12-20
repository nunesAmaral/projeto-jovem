<?php

include_once 'model/model.php';
class ImgModel extends Model
{
  public $projeto_id, $nome_imagem, $extensao;
  public $imagens;
  public $rows;
  public $row;

  public function saveFile($projeto_id)
  {
    if (isset($this->imagens) && count($this->imagens) > 0 && strlen($this->imagens['name'][0]) > 0) {
      // echo '<pre>';
      // var_dump($this->imagens);
      // echo '</pre>';
      $this->projeto_id = $projeto_id;

      $path = "imgs/$this->projeto_id/";

      if (!file_exists($path)) {
        mkdir($path, 0755);
      }

      for ($i = 0; $i < count($this->imagens['name']); $i++) {
        $file_name = $this->imagens['name'][$i];
        $new_file_name = uniqid();
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
          echo $extension, $file_name;
          die("Tipo de arquivo inválido");
        }

        $this->nome_imagem = $new_file_name;
        $this->extensao = $extension;

        $destination = "imgs/$this->projeto_id/$new_file_name.$extension";
        if (move_uploaded_file($this->imagens['tmp_name'][$i], $destination)) {
          $this->save();
        };
      }
    }
  }

  public function save()
  {
    include_once 'DAO/imgDAO.php';
    $dao = new ImgDAO($this->conn);

    $dao->insert($this);
  }

  public function delete(?array $imgs_dados)
  {
    include_once 'DAO/imgDAO.php';
    $dao = new ImgDAO($this->conn);

    if (isset($imgs_dados)) {
      foreach ($imgs_dados as $img_dados) {
        $array_dados = explode(' ', $img_dados);
        $id = $array_dados[0];
        $dao->delete((int) $id);
      }
    }
  }


  public function deleteFilesByReference(int $projeto_id)
  {
    $files = scandir("imgs/$projeto_id");
    $files = array_diff($files, ['.', '..']);
    foreach ($files as $file) {
      unlink("imgs/$projeto_id/$file");
    }
    $directory = "imgs/$projeto_id";

    rmdir($directory);
  }

  public function deleteFile($imgs_dados)
  {
    foreach ($imgs_dados as $img_dados) {
      $array_dados = explode(' ', $img_dados);
      [, $id_projeto, $nome_img, $extensao] = $array_dados;

      unlink("imgs/$id_projeto/$nome_img.$extensao");
    }
  }

  public function getAllRows()
  {
    include_once 'DAO/imgDAO.php';
    $dao = new ImgDAO($this->conn);

    $this->rows = $dao->select();
  }

  public function selectById(int $id)
  {
    include_once 'DAO/projetoDAO.php';
    $dao = new ImgDAO($this->conn);

    $this->row = $dao->selectById($id);
  }
}

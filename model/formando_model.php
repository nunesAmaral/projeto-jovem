<?php
include_once 'model/model.php';

class FormandoModel extends Model
{
  public $id, $nome, $turma, $img_perfil, $formatura_id;

  public function saveFormando()
  {
    include_once 'DAO/formandoDAO.php';
    $dao = new FormandoDAO($this->conn);
    $this->handleImg();
    $dao->insert($this);
    header("Location: /admin/formatura/view?id=$this->formatura_id");
  }

  public function updateFormando()
  {
    include_once 'DAO/formandoDAO.php';
    $dao = new FormandoDAO($this->conn);
    # delete img /formaturaId/fileName;
    $this->handleImg();
    $dao->update($this);

    header("Location: /admin/formatura/view?id=$this->formatura_id");
  }

  public function getRowsByReference()
  {
    include_once 'DAO/formandoDAO.php';
    $dao = new FormandoDAO($this->conn);
    return $dao->selectByReference($this->formatura_id);
  }

  public function handleImg()
  {

    $file_name = $this->img_perfil['name'];
    if (isset($this->img_perfil) && strlen($file_name) > 0) {

      $new_file_name = uniqid();
      $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

      if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        echo $extension, $file_name;
        die("Tipo de arquivo inválido");
      }

      $destination = "imgs/formatura/$this->formatura_id/$new_file_name.$extension";
      if (move_uploaded_file($this->img_perfil['tmp_name'], $destination)) {
        $this->img_perfil = $destination;
      }
    } else {
      $this->img_perfil = null;
    }
  }
}

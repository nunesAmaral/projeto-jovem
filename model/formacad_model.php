<?php
include_once 'model/model.php';

class FormacadModel extends Model
{
  public $id, $prof_id, $formacao;
  public function save(?array $formacoes)
  {
    include 'DAO/formacadDAO.php';
    $dao = new FormacadDAO($this->conn);
    if (isset($formacoes)) {

      foreach ($formacoes as $item) {
        if (strlen($item) > 3) {
          $this->formacao = $item;
          $dao->insert($this);
        }
      }
    }
  }

  public function update(?array $formacoes)
  {
    include 'DAO/formacadDAO.php';
    $dao = new FormacadDAO($this->conn);

    if (isset($formacoes)) {
      foreach ($formacoes as $item) {
        if (strlen($item) > 3) {
          $this->formacao = $item;
          $dao->update($this);
        }
      }
    }
  }


  public function getByReference()
  {
    include 'DAO/formacadDAO.php';
    $dao = new FormacadDAO($this->conn);
    return $dao->selectByReference($this->prof_id);
  }
}

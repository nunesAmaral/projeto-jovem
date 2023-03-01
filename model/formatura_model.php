<?php
include_once 'model/model.php';
class FormaturaModel extends Model
{
  public $descricao, $ano, $id;
  public $imagens;
  public $rows;
  public $formandos;

  public function saveFormatura()
  {
    include_once 'DAO/formaturaDAO.php';
    $dao = new FormaturaDAO($this->conn);
    $id = $dao->insert($this);
    $this->id = $id;
    $this->saveImgs();

    header('Location: /admin/formatura/view?id=' . $this->id);
  }

  public function updateFormatura()
  {
    include_once 'DAO/formaturaDAO.php';
    $dao = new FormaturaDAO($this->conn);
    $dao->update($this);

    header('Location: /admin/formatura/view?id=' . $this->id);
  }

  public function saveImgs()
  {
    include_once 'model/formatura_imgs_model.php';
    $model = new FormaturaImgModel();
    $model->formatura_id = $this->id;
    $model->saveFile($this->imagens);
  }


  public function getAllRows()
  {
    include_once 'DAO/formaturaDAO.php';
    $dao = new FormaturaDAO($this->conn);
    $this->rows = $dao->select();
  }

  public function getImgs()
  {
    include_once 'model/formatura_imgs_model.php';
    $model = new FormaturaImgModel();
    $model->getAllRows();
    $this->imagens = $model->rows;
  }

  public function getFormaturaById()
  {
    include_once 'DAO/formaturaDAO.php';
    $dao = new FormaturaDAO($this->conn);
    $formInfo = $dao->selectById($this->id);
    $this->descricao = $formInfo->descricao;
    $this->ano = $formInfo->ano_form;
  }

  public function saveFormandos()
  {
    include_once 'model/formando_model.php';
    $model = new FormandoModel();

    $model->saveFormando();
  }

  public function getFormandos()
  {
    include_once 'model/formando_model.php';
    $model = new FormandoModel();
    $model->formatura_id = $this->id;
    $this->formandos = $model->getRowsByReference();
  }
}

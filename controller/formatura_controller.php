<?php

class FormaturaController
{
  public static function adminFormatura()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }

    include_once 'model/formatura_model.php';
    $model = new FormaturaModel();

    $model->getAllRows();
    $model->getImgs();

    include_once 'view/painel_admin/adm_formandos.php';
    include_once 'view/components/new_formatura_form.php';
    include_once 'view/components/new_formando_modal.php';
    include_once 'js/script.php';
  }
  public static function saveFormatura()
  {
    include_once 'model/formatura_model.php';
    $model = new FormaturaModel();
    $model->ano = (int) $_POST['ano'];
    $model->descricao = $_POST['descricao'];
    $model->imagens = $_FILES['imagens'];
    $model->saveFormatura();
  }

  public static function saveFormando()
  {
    include 'model/formando_model.php';

    $model = new FormandoModel;
    $model->nome =  $_POST['nome'];
    $model->turma =  $_POST['turma'];
    $model->img_perfil =  $_FILES['perfil_formando'];
    $model->formatura_id = $_GET['id'];
    $model->saveFormando();
  }

  public static function viewFormatura()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }

    include_once 'model/formatura_model.php';
    $model = new FormaturaModel();
    $model->id = (int) $_GET['id'];
    $model->getFormaturaById();
    $model->getFormandos();
    $model->getImgs();

    include_once 'model/formatura_model.php';
    include_once 'view/painel_admin/adm_formatura.php';
    include_once 'view/components/new_formando_modal.php';
    include_once 'view/components/edit_formatura_modal.php';
    include_once 'js/script.php';
    if (isset($_GET['idforman']) && $_GET['idforman'] != null)
      include_once 'view/components/edit_formando_modal.php';
  }

  public static function updateFormatura()
  {
    include_once 'model/formatura_model.php';
    $model = new FormaturaModel();

    $model->id = (int) $_GET['id'];
    $model->descricao = $_POST['descricao'];
    $model->ano = $_POST['ano'];

    $model->updateFormatura();
  }

  public static function updateFormando()
  {
    include_once 'model/formando_model.php';
    $model = new FormandoModel();

    $model->nome =  $_POST['nome'];
    $model->turma =  $_POST['turma'];
    $model->img_perfil =  $_FILES['perfil_formando'];
    $model->formatura_id = $_GET['formatura'];
    $model->id = (int) $_GET['id'];
    $model->updateFormando();
  }
}

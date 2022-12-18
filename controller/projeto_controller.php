<?php

class ProjetoController
{

  public static function adminProjeto()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }

    include_once 'model/projeto_model.php';
    $projetoModel = new ProjetoModel();
    $projetoModel->getAllRows();

    include_once 'model/img_model.php';
    $imgModel = new ImgModel();
    $imgModel->getAllRows();

    include 'view/painel_admin/adm_projeto.php';
    include 'view/components/new_project_form.php';
    var_dump($projetoModel->rows);
  }

  public static function saveForm()
  {
    include_once 'model/projeto_model.php';

    $model = new ProjetoModel();
    $model->titulo = $_POST['titulo'];
    $model->descricao = $_POST['descricao'];
    $model->data_projeto = $_POST['data-projeto'];
    $model->laboratorio = $_POST['laboratorio'];
    $projeto_id = $model->save();

    ProjetoController::saveImgs($projeto_id);

    header('Location: /admin/projeto');
  }

  public static function saveImgs($projeto_id)
  {
    include_once 'model/img_model.php';

    $model = new ImgModel();
    $model->imagens = $_FILES['imagens'];
    $model->saveFile($projeto_id);
  }
}

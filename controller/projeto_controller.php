<?php

class ProjetoController
{

  public static function adminProjeto()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }

    include 'model/projeto_model.php';
    $projetoModel = new ProjetoModel();
    $projetoModel->getAllRows();

    include 'model/img_model.php';
    $imgModel = new ImgModel();
    $imgModel->getAllRows();

    include 'view/painel_admin/adm_projeto.php';
    include 'view/components/new_project_form.php';

    if (isset($_GET['id']) && $_GET['id'] >= 0) {
      $projetoModel->selectById((int) $_GET['id']);
      $row = $projetoModel->row;

      $imgModel->selectById((int) $_GET['id']);
      $imgs = $imgModel->row;

      include 'view/components/edit_project_form.php';
    }
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

  public static function updateForm()
  {
    include_once 'model/projeto_model.php';

    $model = new ProjetoModel();
    $model->titulo = $_POST['titulo'];
    $model->descricao = $_POST['descricao'];
    $model->data_projeto = $_POST['data-projeto'];
    $model->laboratorio = $_POST['laboratorio'];
    $model->id = (int) $_GET['id'];
    $model->update();

    if (isset($_POST['imagens'])) ProjetoController::deleteImgs($_POST['imagens'], $model->id);
    ProjetoController::saveImgs($model->id);
  }

  public static function deleteImgs($img_dados, $projeto_id)
  {
    include_once 'model/img_model.php';
    $model = new ImgModel();
    $model->delete($img_dados);
    $model->deleteFile($img_dados, $projeto_id);
  }

  public static function deleteProjeto()
  {
    $id = (int) $_GET['id'];

    include_once 'model/img_model.php';
    $imgModel = new ImgModel;
    $imgModel->deleteFilesByReference($id);

    include_once 'model/projeto_model.php';
    $projetoModel = new ProjetoModel;
    $projetoModel->delete($id);
  }
}

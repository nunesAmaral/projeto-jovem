<?php
class ProfessorController
{
  public static function adminProfessor()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }


    include_once 'model/professores_model.php';
    $model = new ProfessorModel();
    $model->getMaterias();
    $model->getAllRows();

    include_once 'view/painel_admin/adm_professor.php';
    include_once 'view/components/new_professor_form.php';
    if (isset($_GET['id']) && $_GET['id'] >= 0) {
      $model->selectById((int) $_GET['id']);
      $professor = $model->row;

      $model->selectMateriasByReference((int) $_GET['id']);
      $model->getformacao((int) $_GET['id']);

      include 'view/components/edit_professor_form.php';
      include_once 'js/script.php';
    } else {
      include_once 'js/script.php';
    }
  }

  public static function saveForm()
  {
    include 'model/professores_model.php';
    $model = new ProfessorModel;

    $model->nome = $_POST['nome'];
    $model->descricao = $_POST['descricao'];
    $model->email = $_POST['email'];
    $model->img_perfil = $_FILES['img-perfil'];
    $model->formacao = $_POST['formacoes'];
    $model->materias = $_POST['materias'];
    $model->save();
  }

  public static function updateForm()
  {
    include_once 'model/professores_model.php';
    $model = new ProfessorModel();

    $model->id = (int) $_GET['id'];
    $model->nome = $_POST['nome'];
    $model->descricao = $_POST['descricao'];
    $model->email = $_POST['email'];
    $model->formacao = $_POST['formacoes'];
    $model->materias = $_POST['materias'];
    $model->img_perfil = $_FILES['img-perfil'];

    $model->update();
  }
  public static function deleteProfessor()
  {
    include_once 'model/professores_model.php';
    $model = new ProfessorModel();
    $model->id = (int) $_GET['id'];
    $model->delete();
  }
}

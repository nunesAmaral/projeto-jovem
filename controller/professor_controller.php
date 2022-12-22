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
    echo '<pre>';
    var_dump($model->materiasByProfessor);
    echo '</pre>';
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
}

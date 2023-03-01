<?php
include_once 'model/model.php';
class ProfessorModel extends Model
{
  public $id, $nome, $email, $img_perfil, $descricao;
  public $formacao, $arrFormacao;
  public $materias, $materiasByProfessor, $profMaterias;
  public $totalRegistred, $rows, $row;

  public function save()
  {
    include_once 'DAO/professorDAO.php';
    $dao = new ProfessorDAO($this->conn);
    $this->saveImgFile();
    $this->id = (int) $dao->insert($this);
    $this->saveFormacao();

    $this->referencesRole();
    header('Location: /admin/professores');
  }

  public function update()
  {
    include_once 'DAO/professorDAO.php';
    $dao = new ProfessorDAO($this->conn);
    $this->saveImgFile();
    $dao->update($this);
    if ($this->img_perfil) $dao->updateImg($img_perfil);

    $this->saveFormacao();
    $this->referencesRole();
    header('Location: /admin/professores');
  }

  public function delete()
  {
    include_once 'DAO/professorDAO.php';
    $dao = new ProfessorDAO($this->conn);
    $dao->deleteById($this->id);
    header('Location: /admin/professores');
  }

  public function selectById($id)
  {
    include_once 'DAO/professorDAO.php';
    $dao = new ProfessorDAO($this->conn);
    $this->row = $dao->selectById($id);
  }

  public function getMaterias()
  {
    include_once 'model/materia_model.php';
    $model = new MateriaModel();
    $model->getAllRows();
    $this->materiasByProfessor = $model->getJoinedRows();
    $this->materias = $model->rows;
  }

  public function selectMateriasByReference($id)
  {
    include_once 'model/materia_model.php';
    $model = new MateriaModel();
    $this->profMaterias = $model->selectByProfId($id);
  }

  public function saveImgFile()
  {
    $file_name = $this->img_perfil['name'];
    if (isset($this->img_perfil) && strlen($file_name) > 0) {

      $new_file_name = uniqid();
      $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

      if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        echo $extension, $file_name;
        die("Tipo de arquivo inválido");
      }

      $destination = "imgs/professores/$new_file_name.$extension";
      if (move_uploaded_file($this->img_perfil['tmp_name'], $destination)) {
        $this->img_perfil = $destination;
      }
    } else {
      $this->img_perfil = null;
    }
  }

  public function saveFormacao()
  {
    include_once 'model/formacad_model.php';
    $model = new FormacadModel();
    $model->prof_id = $this->id;
    $model->deleteByProfId();
    $model->save($this->formacao);
  }

  public function getAllRows()
  {
    include_once 'DAO/professorDAO.php';
    $dao = new ProfessorDAO($this->conn);
    $this->rows = $dao->select();
    $this->totalRegistred = count($this->rows);
  }

  public function getFormacao($id)
  {
    include_once 'model/formacad_model.php';
    $model = new FormacadModel();
    $model->prof_id = $id;
    $this->arrFormacao = $model->getByReference();
  }

  public function referencesRole()
  {
    include_once 'model/pivot_materias_model.php';
    $model = new PivotMateriasModel();
    $model->prof_id = $this->id;
    $model->delete($this->materias);
    $model->save($this->materias);
  }
}

<?php

class AdmLoginModel
{
  public $id, $username, $pass;
  public $rows;

  public function isValid()
  {
    include 'DAO/adminDAO.php';
    $dao = new AdminDAO();
    $rows = $dao->select($this);

    foreach ($rows as $key) {
      $isEqual = $key->username === $this->username && $key->pass === $this->pass;
      if ($isEqual) {
        $_SESSION['authenticated'] = true;
        header('Location: /admin');
      } else {
        $_SESSION['authenticated'] = false;
        header('Location: /admin/login?login=erro');
      }
    }
  }

  public function getAllRows()
  {
    include 'DAO/adminDAO.php';
    $dao = new AdminDAO();

    $this->rows = $dao->select();
  }
}

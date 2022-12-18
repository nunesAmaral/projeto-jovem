<?php

class AdminController
{
  public static function painelAdmin()
  {
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
      header('Location: /admin/login?login=erro2');
    }

    include 'view/painel_admin/home.php';
  }

  public static function loginForm()
  {
    isset($_GET['login']) && $_GET['login'] == 'erro' ? $isInvalid = true : $isInvalid = false;
    isset($_GET['login']) && $_GET['login'] == 'erro2' ? $hasExpired = true : $hasExpired = false;
    include 'view/painel_admin/adm_login.php';
  }
  public static function loginValidate()
  {
    session_start();
    include 'model/admin_model.php';

    $model = new AdmLoginModel();
    $model->username = $_POST['username'];
    $model->pass = $_POST['pass'];
    $model->isValid();
  }
}

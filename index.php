<?php

// Index controlará as rotas da aplicação e renderizará as views instanciadas no controller.
include 'controller/admin_controller.php';
include 'controller/projeto_controller.php';
include 'controller/professor_controller.php';
include 'controller/formatura_controller.php';

// A var $url recebe da função "parse_url", o URI requerido junto ao caminho da URL, formando 
// o caminho completo requerido pelo usuário. O uso de parâmetros na URL não é afetado pelo roteamento.
$url =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

  case '/admin':
    AdminController::painelAdmin();
    break;

  case '/admin/login':
    AdminController::loginForm();
    break;

  case '/admin/login/validate':
    AdminController::loginValidate();
    break;

  case '/admin/projeto':
    projetoController::adminProjeto();
    break;

  case '/admin/projeto/save':
    ProjetoController::saveForm();
    break;

  case '/admin/projeto/update':
    ProjetoController::updateForm();
    break;

  case '/admin/projeto/delete':
    ProjetoController::deleteProjeto();
    break;

  case '/admin/professores':
    ProfessorController::adminProfessor();
    break;

  case '/admin/professores/save':
    ProfessorController::saveForm();
    break;

  case '/admin/professores/update':
    ProfessorController::updateForm();
    break;

  case '/admin/professores/delete':
    ProfessorController::deleteProfessor();
    break;

  case '/admin/formatura':
    FormaturaController::adminFormatura();
    break;

  case '/admin/formatura/save':
    FormaturaController::saveFormatura();
    break;

  case '/admin/formatura/view':
    FormaturaController::viewFormatura();
    break;

  case '/admin/formatura/view/formando/save':
    FormaturaController::saveFormando();
    break;

  case '/admin/formatura/update':
    FormaturaController::updateFormatura();
    break;

  case '/admin/formatura/view/formando/update':
    FormaturaController::updateFormando();
    break;

  case '/':
    include 'view/pages/home.php';
    break;

  case '/professores':
    include 'view/pages/professores.php';
    break;

  case '/formandos':
    include 'view/pages/formandos.php';
    break;

  case '/projetos':
    include 'view/pages/projetos.php';
    break;

  case '/projetos/projeto':
    include 'view/pages/projeto.php';
    break;

  default:
    echo "erro 404, página inicial redirecionada.";
    break;
}

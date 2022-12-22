<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professores: painel administrativo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/admin-projeto.css">
  <link rel="stylesheet" href="/css/admin-professor.css">
  <link rel="stylesheet" href="/css/admin-projeto-modal.css">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      // $('.js-selector-multiple').select2();
      $('#js-selector-multiple').select2({
        dropdownParent: $('#new-professor'),
        width: 'resolve'
      });
    });
  </script>
</head>

<body>
  <header>
    <div class="logo">Jovem</div>
    <div>Config</div>
  </header>
  <nav>
    <ul>
      <li><a href="">Projeto</a></li>
      <li><a href="">Contato</a></li>
      <li><a href="">Filosofia</a></li>
      <li><a href="">Direção</a></li>
      <li><a href="">Formandos</a></li>
      <li><a href="">Professores</a></li>
      <li><a href="">Imagens</a></li>
    </ul>
  </nav>
  <div class="container card-container">
    <div class="card green">
      <span class="text">Total de professores cadastrados</span>
      <span class="total-registred"><?= $model->totalRegistred ?></span>
    </div>

    <div class="card blue"><span class="text">Adicione professores agora mesmo.</span> <button class="new-project" onclick="newProfessorModal.showModal()"><img src="/assets/plus-sign.svg" alt=""> Adicionar professor</button></div>
  </div>

  <h2>Professores Cadastrados</h2>
  <div class="project-list-columns"><span style="justify-self: left;">Perfil</span> <span>Matérias</span> <span style="justify-self: right;">Ações</span></div>

  <?php foreach ($model->rows as $row) : ?>
    <div class="project-row">
      <div class="project-preview">

        <img class="project-img" src="/<?= $row->img_perfil ?>">

        <span class="project-title"><?= $row->nome ?></span>
      </div>
      <div class="published-date-container">
        <?php foreach ($model->materiasByProfessor as $item) {
          if ($item->prof_id == $row->id) { ?>
            <span><?= $item->nome ?></span>
        <?php }
        } ?>
      </div>

      <div class="action-container">
        <a onclick="editProjectModal.showModal()" href="/admin/projeto?id=<?= $row->id ?>"><img src="/assets/edit-btn.svg" alt=""></a>
        <a href="/admin/projeto/delete?id=<?= $row->id ?>" onclick="return confirm('Tem certeza que deseja apagar o projeto?')"><img src="/assets/delete-btn.svg" alt=""></a>
      </div>
    </div>
  <?php endforeach ?>
  <script>
  </script>
</body>

</html>
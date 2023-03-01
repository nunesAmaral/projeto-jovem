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
  <link rel="stylesheet" href="/css/admin-formatura.css">
  <link rel="stylesheet" href="/css/admin-projeto-modal.css">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      // $('.js-selector-multiple').select2();
      const editModal = document.getElementById('edit-professor')
      if (editModal) {
        $('.js-selector-multiple').select2({
          dropdownParent: $('#edit-professor'),
          width: 'resolve'
        });
      } else {
        $('.js-selector-multiple').select2({
          dropdownParent: $('#new-professor'),
          width: 'resolve'
        });
      }
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

  <div class="grid-container">


    <div class="container card-container">
      <div class="card green">
        <span class="text">Total de formaturas cadastrados</span>
        <span class="total-registred"> <?= count($model->formandos); ?></span>
      </div>
    </div>

    <div class="imgs-formatura-section">
      <div class="flex">
        <h2>Imagens<h2><button>Editar imagens</button>
      </div>

      <div class="formatura-img-container">

        <?php foreach ($model->imagens as $img) : ?>
          <div class="formando-img">
            <img src="/<?= $img->path ?>" alt="imagem da formatura">
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <div class="hgroup">
      <div class="formatura-title">
        <h2>Formatura</h2>
      </div>

      <div class="flex formandos-title">
        <h2>Formandos</h2>
        <button id="add-formando-btn" onclick="newFormandoModal.showModal()">Adicionar novo</button>
      </div>

    </div>

    <div class="formatura-info">
      <span class="title">Descrição</span>
      <span class="descricao"><?= $model->descricao ?></span>

      <span class="title">Ano</span>
      <span class="ano"><?= $model->ano ?></span>

      <button class="edit-btn" onclick="editFormaturaModal.showModal()"><img src="/assets/edit-icon.png" alt="editar"> <span>Editar</span> </button>
    </div>
    <div class="formandos-container">
      <!-- Foreach start -->
      <?php foreach ($model->formandos as $formando) : ?>
        <div class="formando-row">
          <div class="formando__perfil">
            <img src="/<?= $formando->img ?>" alt="formando">
            <span class="formando__nome"><?= $formando->nome ?></span>
          </div>
          <div class="formando__turma"><?= $formando->turma ?></div>
          <div class="formando__action">
            <a href="/admin/formatura/view?id=<?= $model->id ?>&idforman=<?= $formando->id ?>"><img src="/assets/edit-btn.svg" alt="editar formando"></a>
            <a href=""><img src="/assets/delete-btn.svg" alt="deletar formando"></a>
          </div>
        </div>
      <?php endforeach ?>
      <!-- Foreach end -->
    </div>
  </div>

</body>

</html>
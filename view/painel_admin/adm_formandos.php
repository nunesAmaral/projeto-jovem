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
  <div class="container card-container">
    <div class="card green">
      <span class="text">Total de formaturas cadastrados</span>
      <span class="total-registred"> 2
        <!--  $model->totalRegistred -->
      </span>
    </div>

    <div class="card blue"><span class="text">Cadastre uma nova formatura.</span> <button class="new-project" onclick="newFormaturaModal.showModal()"><img src="/assets/plus-sign.svg" alt=""> Cadastrar formatura</button></div>
  </div>

  <h2>Formaturas</h2>
  <div class="formatura-cards">

    <!-- foreach -->
    <?php foreach ($model->rows as $row) : ?>
      <div class="formatura__card">
        <div>
          <h4>Formandos <?= $row->ano_form ?> </h4>
          <span class="text-preview"><?= $row->descricao ?></span>
          <div class="card-alunos__imgs">

            <?php $index = 0 ?>
            <?php foreach ($model->imagens as $imagem) : ?>
              <?php if ($imagem->formatura_id == $row->id) : ?>
                <span class="perfil-img-sm"> <img src="/<?= $imagem->path ?>" alt=""></span>
                <?php ++$index ?>
              <?php endif ?>
              <?php if ($index > 2) break; ?>
            <?php endforeach ?>

            <a href="/admin/formatura/view?id=<?= $row->id ?>">Ver mais</a>
          </div>
        </div>
        <div class="formatura__card-actions">
          <a href="/admin/formatura/view?id=<?= $row->id ?>"><img src="/assets/edit-btn.svg" alt="editar"></a>
          <a href="/admin/formatura/delete?id=<?= $row->id ?>"><img src="/assets/delete-btn.svg" alt="deletar"></a>
        </div>
      </div>
    <?php endforeach ?>
  </div>

</body>

</html>
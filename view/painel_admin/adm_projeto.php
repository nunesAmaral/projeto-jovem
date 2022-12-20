<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto: painel administrativo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/admin-projeto.css">

</head>

<body>

  <dialog class="new-project">
    <h2>Editar projeto</h2>
    <form enctype="multipart/form-data" action="/admin/projeto/save" method="post">
      <label for="titulo">Título:</label>
      <input name="titulo" type="text" placeholder="Máximo 24 caracteres">
      <label for="descricao">Descrição:</label>
      <textarea name="descricao" placeholder="Máximo 250 caracteres"></textarea>
      <label for="imagens">Imagens:</label>
      <input name="imagens[]" type="file" multiple>
      <div class="flex select-container">
        <div>
          <label for="laboratorio">Laboratório:</label>
          <select name="laboratorio" id="">
            <option value="" selected disabled hidden>Selecione</option>
            <option value="1">Matemática</option>
            <option value="2">Ciências da natureza</option>
            <option value="3">Humanas</option>
            <option value="4">Linguagens</option>
          </select>
        </div>
        <div>
          <label for="data-projeto">Data do projeto:</label>
          <input name="data-projeto" type="date">
        </div>
      </div>

      <div class="btn-container flex">
        <button class="btn primary">Publicar</button>
        <button class="btn seccondary" onclick="closeModal()">Cancelar</button>
      </div>
    </form>
  </dialog>

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
      <span class="text">Total de projetos cadastrados</span>
      <span class="total-registred"><?= $projetoModel->getTotalRegistred() ?></span>
    </div>

    <div class="card blue"><span class="text">Publique novos projetos agora mesmo.</span> <button class="new-project" onclick="newProjectModal.showModal()"><img src="../../assets/plus-sign.svg" alt=""> Publicar novo projeto</button></div>
  </div>

  <h2>Projetos cadastrados</h2>
  <div class="project-list-columns"><span style="justify-self: left;">Projeto</span> <span>Data de publicação</span> <span>Laboratório</span> <span style="justify-self: right;">Ações</span></div>

  <?php foreach ($projetoModel->rows as $row) { ?>
    <div class="project-row">
      <div class="project-preview">

        <?php foreach ($imgModel->rows as $img) {
          if ($img->projeto_id == $row->id) { ?>
            <img class="project-img" src="<?= "/imgs/$row->id/$img->nome_img.$img->extensao" ?>">
        <?php break;
          }
        } ?>

        <span class="project-title"><?= $row->titulo ?></span>
      </div>
      <div class="published-date-container">
        <span><?= $row->data_projeto ?></span>
      </div>
      <div class="lab-container">
        <span class="<?= $row->lab_class ?>"><?= $row->laboratorio ?></span>
      </div>

      <div class="action-container">
        <a onclick="editProjectModal.showModal()" href="/admin/projeto?id=<?= $row->id ?>"><img src="/assets/edit-btn.svg" alt=""></a>
        <a href="/admin/projeto/delete?id=<?= $row->id ?>" onclick="return confirm('Tem certeza que deseja apagar o projeto?')"><img src="/assets/delete-btn.svg" alt=""></a>
      </div>
    </div>
  <?php } ?>
  <script>

  </script>
</body>

</html>
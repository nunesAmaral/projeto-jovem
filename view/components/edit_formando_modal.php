<!-- byFormandoId -->

<dialog class="new-project" id="edit-formando">
  <h2>Editar formando</h2>
  <?php foreach ($model->formandos as $formando) : ?>
    <?php if ($formando->id == $_GET['idforman']) : ?>
      <form enctype="multipart/form-data" action="/admin/formatura/view/formando/update?id=<?= $formando->id ?>&formatura=<?= $formando->formatura_id ?>" method="post">

        <div class="flex">
          <div>
            <label for="img-perfil">
              <img id="profile-preview" src="/<?= $formando->img ?>" alt="foto de perfil">
            </label>

            <input type="file" name="perfil_formando" id="img-perfil">
          </div>

          <div class="form-column">

            <label for="nome">Nome:</label>
            <input name="nome" type="text" placeholder="Digite o nome do formando" value="<?= $formando->nome ?>">

            <label for="turma">Turma:</label>
            <select name="turma" id="turma">
              <option value="3A" <?= ($formando->turma == '3A') ? 'selected' : '' ?>>3º A</option>
              <option value="3B" <?= ($formando->turma == '3B') ? 'selected' : '' ?>>3º B</option>
              <option value="3C" <?= ($formando->turma == '3C') ? 'selected' : '' ?>>3º C</option>
              <option value="3D" <?= ($formando->turma == '3D') ? 'selected' : '' ?>>3º D</option>
            </select>
          </div>
        </div>
        <div class="btn-container flex">
          <button class="btn primary">Editar</button>
          <button class="btn seccondary" onclick="closeModal()">Cancelar</button>
        </div>


      <?php endif ?>
    <?php endforeach ?>
      </form>
</dialog>

<script>
  const editFormandoModal = document.getElementById('edit-formando');

  editFormandoModal.showModal();

  function closeEditModal() {
    event.preventDefault();
    editFormandoModal.close();
  }
</script>
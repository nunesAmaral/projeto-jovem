<dialog class="new-project" id="edit-project">
  <h2>Editar projeto</h2>
  <form enctype="multipart/form-data" action="/admin/projeto/update?id=<?= $row->id ?>" method="post">
    <label for="titulo">Título:</label>
    <input name="titulo" type="text" placeholder="Máximo 24 caracteres" value="<?= $row->titulo ?>">
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" placeholder="Máximo 250 caracteres"><?= $row->descricao ?></textarea>
    <label for="imagens">Imagens:</label>
    <input name="imagens[]" type="file" multiple>
    <div class="flex select-container">
      <div>
        <label for="laboratorio">Laboratório:</label>
        <select name="laboratorio" id="">
          <option value="" disabled hidden>Selecione</option>
          <option <?= $row->lab_class = 'lab-matematica' ? 'selected' : '' ?> value="1">Matemática</option>
          <option <?= $row->lab_class = 'lab-natureza' ? 'selected' : '' ?> value="2">Ciências da natureza</option>
          <option <?= $row->lab_class = 'lab-humanas' ? 'selected' : '' ?> value="3">Humanas</option>
          <option <?= $row->lab_class = 'lab-linguagens' ? 'selected' : '' ?> value="4">Linguagens</option>
        </select>
      </div>
      <div>
        <label for="data-projeto">Data do projeto:</label>
        <input name="data-projeto" type="date" value="<?= $row->data_projeto ?>">
      </div>
    </div>
    <span class="img-container-title">Remover imagens:</span>
    <div class="flex imgs-container">

      <?php foreach ($imgs as $img) { ?>
        <input type="checkbox" name="imagens[]" id="<?= $img->id ?>" value="<?= "$img->id $img->projeto_id $img->nome_img $img->extensao" ?>">
        <label for="<?= $img->id ?>"><img class="edit-img" src="<?= "/imgs/projetos/$img->projeto_id/$img->nome_img.$img->extensao" ?>"></label>
      <?php } ?>

    </div>

    <div class="btn-container flex">
      <button class="btn primary">Confirmar</button>
      <button class="btn seccondary" onclick="closeEditModal()">Cancelar</button>
    </div>
  </form>
</dialog>


<script>
  const editProjectModal = document.getElementById('edit-project');

  editProjectModal.showModal();

  function closeEditModal() {
    event.preventDefault();
    editProjectModal.close();
  }
</script>
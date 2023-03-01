<dialog class="new-project" id="edit-formatura">
  <h2>Editar formatura</h2>
  <form enctype="multipart/form-data" action="/admin/formatura/update?id=<?= $model->id ?>" method="post">

    <label for="ano">Ano da formatura:</label>
    <input name="ano" type="number" placeholder="2017" min="1970" max="2099" value="<?= $model->ano ?>">

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao"><?= $model->descricao ?></textarea>

    <div class="btn-container flex">
      <button class="btn primary">Editar</button>
      <button class="btn seccondary btn-cancel">Cancelar</button>
    </div>
  </form>
</dialog>
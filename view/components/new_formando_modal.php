<dialog class="new-project" id="new-formando">
  <h2>Adicionar formando</h2>
  <form enctype="multipart/form-data" action="/admin/formatura/view/formando/save?id=<?= $model->id ?>" method="post">

    <label for="nome">Nome:</label>
    <input name="nome" type="text" placeholder="Digite o nome do formando">

    <label for="perfil_formando">Perfil:</label>
    <input name="perfil_formando" type="file">

    <label for="turma">Turma:</label>
    <select name="turma" id="turma">
      <option value="3A">3º A</option>
      <option value="3B">3º B</option>
      <option value="3C">3º C</option>
      <option value="3D">3º D</option>
    </select>

    <div class="btn-container flex">
      <button class="btn primary">Cadastrar</button>
      <button class="btn seccondary" onclick="closeModal()">Cancelar</button>
    </div>
  </form>
</dialog>
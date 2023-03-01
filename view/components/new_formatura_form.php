<dialog class="new-project" id="new-formatura">
  <h2>Adicionar formatura</h2>
  <form enctype="multipart/form-data" action="/admin/formatura/save" method="post">

    <label for="ano">Ano da formatura:</label>
    <input name="ano" type="text" placeholder="2017" min="1970" max="2099">

    <label for="imagens">Imagens:</label>
    <input name="imagens[]" type="file" multiple>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao"></textarea>

    <div class="btn-container flex">
      <button class="btn primary">Cadastrar</button>
      <button class="btn seccondary" onclick="closeModal()">Cancelar</button>
    </div>
  </form>
</dialog>
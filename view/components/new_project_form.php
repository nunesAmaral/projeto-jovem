<dialog class="new-project">
  <h2>Criar projeto</h2>
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

<script>
  const newProjectModal = document.querySelector('dialog.new-project');

  function closeModal() {
    event.preventDefault();
    newProjectModal.close();
  }
</script>
<dialog class="new-project" id="new-professor">
  <h2>Adicionar Professor</h2>
  <form enctype="multipart/form-data" action="/admin/professores/save" method="post">
    <label for="nome">Nome:</label>
    <input name="nome" type="text" placeholder="Máximo 24 caracteres">

    <label for="email">Email:</label>
    <input name="email" type="email" placeholder="exemplo@gmail.com">

    <label for="descricao">Descrição: (opcional)</label>
    <textarea id="descricao" name="descricao" placeholder="Máximo 250 caracteres"></textarea>

    <div class="flex new-professor-form">
      <div>
        <label for="img-perfil">
          <img id="profile-preview" src="/assets/person-profile.svg" alt="foto de perfil">
        </label>

        <input type="file" name="img-perfil" id="img-perfil">

      </div>

      <div class="form-column-2">
        <div class="flex select-btn-container">
          <div class="btn-formacao-controller">
            <label>Formações</label>
            <button onclick="addInput()" class="add-formacoes"><img class="plus-sign" src="/assets/plus-sign.svg" alt=""> Adicionar campo</button>
          </div>
          <div class="input-controller">
            <label for="materias">Matérias</label>
            <select name="materias[]" id="js-selector-multiple" style="width: 100%;" multiple>
              <option value="" disabled hidden>Selecione</option>
              <?php foreach ($model->materias as $materia) : ?>
                <option value="<?= $materia->id ?>"><?= $materia->nome ?></option>
              <?php endforeach ?>

            </select>
          </div>
        </div>
        <div class="formacao-inputs-container">
          <div class="flex form-group">
            <input name="formacoes[]" class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" id="formacao">
            <button id="remove-input-formacao">Remover</button>
          </div>
        </div>
      </div>
    </div>

    <div class="btn-container flex">
      <button class="btn primary">Cadastrar</button>
      <button class="btn seccondary" onclick="closeModal()">Cancelar</button>
    </div>
  </form>
</dialog>

<script>
  //FUNCIONAMENTO DO MODAL
  const newProfessorModal = document.querySelector('dialog#new-professor');

  function closeModal() {
    event.preventDefault();
    newProfessorModal.close();
  }

  //FUNCIONAMENTO DA PREVIEW DA IMAGEM
  $(function() {
    $('#img-perfil').change(function() {
      const file = $(this)[0].files[0];
      const fileReader = new FileReader();
      fileReader.onloadend = function() {
        $('#profile-preview').attr('src', fileReader.result);
      }
      fileReader.readAsDataURL(file);
    })
  })

  //TRATAMENTO DO INPUT DE FORMAÇÕES
  let item = 0;

  function addInput() {
    event.preventDefault();
    item++;
    const inputsContainer = document.querySelector('.formacao-inputs-container');
    inputsContainer.insertAdjacentHTML('beforeend',
      '<div id="campo-' + item + '" class="flex form-group"> <input class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" name="formacoes[]"> <button onclick="removeInput(' + item + ')" id="remove-input-formacao">Remover</button></div>');
  }

  function removeInput(id) {
    event.preventDefault();
    console.log('caiu no bloco da função');
    document.getElementById('campo-' + id).remove();
  }

  //FORM TRAITING
  // $('#js-selector-multiple').select2({
  //   dropdownParent: $('#new-professor')
  // });
</script>
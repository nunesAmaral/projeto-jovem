<script>
  //FUNCIONAMENTO DO MODAL


  const newProfessorModal = document.querySelector('dialog#new-professor');
  const editProfessorModal = document.getElementById('edit-professor');

  if (newProfessorModal) {
    function closeModal() {
      event.preventDefault();
      newProfessorModal.close();
    }
  }

  if (editProfessorModal) {
    editProfessorModal.showModal()

    function closeEditModal() {
      event.preventDefault();
      editProfessorModal.close();
      window.location.href = "/admin/professores"
    }
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

  const btnEditInput = document.querySelector('#edit-professor .add-formacoes');
  const btnNewInput = document.querySelector('#new-professor .add-formacoes');

  const inputsEditContainer = document.querySelector('#edit-professor .formacao-inputs-container');
  const inputsNewContainer = document.querySelector('#new-professor .formacao-inputs-container');

  console.log(btnEditInput);

  if (btnNewInput) {

    btnNewInput.addEventListener('click', () => {
      event.preventDefault();
      let item = 0;

      item++;

      inputsNewContainer.insertAdjacentHTML('beforeend',
        '<div id="campo-' + item + '" class="flex form-group"> <input class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" name="formacoes[]"> <button onclick="removeInput(' + item + ')" id="remove-input-formacao">Remover</button></div>');
    })
  } else if (btnEditInput) {

    btnEditInput.addEventListener('click', () => {
      event.preventDefault();

      let item = 0;
      item++;

      inputsEditContainer.insertAdjacentHTML('beforeend',
        '<div id="campo-' + item + '" class="flex form-group"> <input class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" name="formacoes[]"> <button onclick="removeInput(' + item + ')" id="remove-input-formacao">Remover</button></div>');
    })
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
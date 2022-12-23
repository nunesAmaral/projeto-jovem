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

  const btnEditInput = document.querySelector('#edit-professor .add-formacoes');
  const inputsEditContainer = document.querySelector('#edit-professor .formacao-inputs-container');

  btnEditInput.addEventListener('click', () => {
    event.preventDefault();
    item++;



    inputsEditContainer.insertAdjacentHTML('beforeend',
      '<div id="campo-' + item + '" class="flex form-group"> <input class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" name="formacoes[]"> <button onclick="removeInput(' + item + ')" id="remove-input-formacao">Remover</button></div>');
    console.log('B');
  })


  item = 0;

  const btnNewInput = document.querySelector('#new-professor .add-formacoes');
  const inputsNewContainer = document.querySelector('#new-professor .formacao-inputs-container');

  btnNewInput.addEventListener('click', () => {

    event.preventDefault();
    item++;

    inputsNewContainer.insertAdjacentHTML('beforeend',
      '<div id="campo-' + item + '" class="flex form-group"> <input class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" name="formacoes[]"> <button onclick="removeInput(' + item + ')" id="remove-input-formacao">Remover</button></div>');
    console.log('B');
  })

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
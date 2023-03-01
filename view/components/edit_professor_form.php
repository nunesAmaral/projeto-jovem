<dialog class="new-project edit-professor professor-modal" id="edit-professor">
  <h2>Editar Professor</h2>
  <form enctype="multipart/form-data" action="/admin/professores/update?id=<?= $professor->id ?>" method="post">

    <div class="flex first-row-modal">
      <div>
        <label for="img-perfil">
          <img id="profile-preview" src="/<?= $professor->img_perfil ?>" alt="foto de perfil">
        </label>

        <input type="file" name="img-perfil" id="img-perfil">
      </div>

      <div>
        <label for="nome">Nome:</label>
        <input name="nome" type="text" placeholder="Máximo 24 caracteres" value="<?= $professor->nome ?>">

        <div class="input-controller">
          <label for="materias" class="mt-1">Matérias</label>
          <select name="materias[]" class="js-selector-multiple" style="width: 100%;" multiple>
            <option value="" disabled hidden>Selecione</option>

            <?php foreach ($model->materias as $materia) : ?>
              <?php unset($truly)  ?>
              <?php foreach ($model->profMaterias as $profMateria) : ?>
                <?php if ($profMateria->id == $materia->id) { ?>
                  <option value="<?= $materia->id ?>" selected><?= $materia->nome ?></option>
                  <?php $truly = true ?>
                <?php } ?>
              <?php endforeach; ?>
              <?php if ($truly) continue;  ?>
              <option value="<?= $materia->id ?>"> <?= $materia->nome ?> </option>
            <?php endforeach; ?>

          </select>
        </div>
      </div>

    </div>

    <label for="email" class="mt-1">Email:</label>
    <input name="email" type="email" placeholder="exemplo@gmail.com" value="<?= $professor->email ?> ">

    <label for="descricao">Sobre: (opcional)</label>
    <textarea id="descricao" name="descricao" placeholder="Máximo 250 caracteres"><?= $professor->descricao ?></textarea>

    <div class="prof-formacoes">
      <label class="formacoes-title">Formações</label>
      <?php foreach ($model->arrFormacao as $formacao) { ?>
        <input type="checkbox" name="formacoes[]" id="<?= $formacao->id  ?>" value="">
        <label class="label-formacoes" for="<?= $formacao->id ?>"> <?= $formacao->formacao ?> </label>
      <?php } ?>
    </div>

    <div class="btn-formacao-controller">
      <!-- <label>Formação</label> -->
      <button class="add-formacoes">
        <img class="plus-sign" src="/assets/plus-sign.svg" alt=""> Adicionar nova formação
      </button>
    </div>

    <div class="formacao-inputs-container">
      <div class="flex form-group">
        <input name="formacoes[]" class="formacao-input" placeholder="Ex: licenciatura em pedagogia" type="text" id="formacao">
        <button id="remove-input-formacao">Remover</button>
      </div>
      <!-- aqui -->
    </div>

    <div class="btn-container flex">
      <button class="btn primary">Cadastrar</button>
      <button class="btn seccondary" onclick="closeEditModal()">Cancelar</button>
    </div>
  </form>
</dialog>
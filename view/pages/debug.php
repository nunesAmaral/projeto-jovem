<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>debug</title>
</head>

<body>
  <?php foreach ($model->rows as $item) : ?>
    <ul>
      <li>id: <?= $item->id ?></li>
      <li>User: <?= $item->username ?></li>
      <li>Senha: <?= $item->pass ?></li>
    </ul>
  <?php endforeach ?>
</body>

</html>
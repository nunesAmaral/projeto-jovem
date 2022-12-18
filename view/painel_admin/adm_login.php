<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/admin-login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
</head>

<body id="login_adm">
  <div>
    <!-- Imagem da escola -->
    <img src="../../assets/escola.png" alt="">
  </div>

  <div class="adm__form-container">
    <div>
      <h3 class="h3">Área restrita</h3>
      <p>Para acessar o painel administrativo, você precisará entrar com seu usuário e senha.</p>

      <form method="post" action="/admin/login/validate">

        <label for="text">Usuário:</label>
        <input name="username" type="text" placeholder="Digite aqui seu usuário" required>

        <label for="text">Senha:</label>
        <input name="pass" type="password" placeholder="******" required>
        <?php if ($isInvalid) { ?>
          <div style="color: red;">Ops! Usuário ou senha inválido (s)</div>
        <?php } elseif ($hasExpired) { ?>
          <div style="color: red;">Parece que sua sessão expirou. Por favor, faça login novamente.</div>
        <?php } ?>
        <button class="btn-primary">Entrar</button>
      </form>
    </div>
  </div>
</body>

</html>
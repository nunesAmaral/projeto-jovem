<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Direção</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
</head>

<body>
  <div id="container">
    <header>
      <span class="logo">Escola jovem <span>.</span></span>
      <div id="navbar">
        <nav>
          <ul>
            <li><a href="#">Projetos</a></li>
            <li><a href="#">Filosofia</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Direção</a></li>
            <li><a href="#">Formandos</a></li>
            <li><a href="#">Professores</a></li>
          </ul>
          <div class="selector-area">
            <!-- Seletor ano -->
            <span id="input-select" class="input-select">2017 <span><img src="../assets/seta-select.svg" alt="seta"></span></span>
            <!-- TODO: ESTILIZAR OPÇÕES -->
            <div id="btn-options" class="hide">
              <ul>
                <li>2020</li>
                <li>2017</li>
                <li>2011</li>
                <li>2013</li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <main class="direcao-body">
      <h2 class="h2">Direção do colégio em 2016</h2>
      <div class="direcao-block">
        <div class="dirigente-1">
          <span class="dirigente-1__name">Prof. Cláudio Borges Antônio Neto</span>
          <img src="../assets/conselheiro2.png" alt="">
          <span class="dirigente-1__funcao">Conselho</span>
        </div>

        <div class="dirigente-2">
          <span class="dirigente-2__name">Prof. Cláudio Borges Antônio Neto</span>
          <img src="../assets/direcao.png" alt="">
          <span class="dirigente-2__funcao">Direção</span>
        </div>


        <h2 class="h2">Direção do colégio em 2016</h2>
        <div class="direcao-block">
          <div class="dirigente">
            <span class="dirigente-name">Prof. Cláudio Borges Antônio Neto</span>
            <div class="dirigente__mask">
              <img src="../assets/conselheiro2.png" alt="">
            </div>
            <span class="dirigente-funcao">Conselho</span>
          </div>

          <div class="dirigente">
            <span class="dirigente-name">Prof. Cláudio Borges Antônio Neto</span>
            <div class="dirigente__mask">
              <img src="../assets/direcao.png" alt="">
            </div>
            <span class="dirigente-funcao">Direção</span>
          </div>

          <div class="dirigente">
            <span class="dirigente-name">Prof. Cláudio Borges Antônio Neto</span>
            <div class="dirigente__mask">
              <img src="../assets/conselheiro1.png" alt="">

            </div>
            <span class="dirigente-funcao">Conselho</span>
          </div>
        </div>


        <div class="dirigente-3">
          <span class="dirigente-3__name">Prof. Cláudio Borges Antônio Neto</span>
          <img src="../assets/conselheiro1.png" alt="">
          <span class="dirigente-3__funcao">Conselho</span>
        </div>
      </div>
    </main>
  </div>
  <script src="../js/selectBtn.js"></script>
</body>

</html>
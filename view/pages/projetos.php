<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos os projetos</title>

  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/projeto.css">

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
    <div class="title-block">
      <h2>PROJETOS</h2>
      <button>
        Filtrar
        <svg class="filter-arrow" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.0002 0V20" stroke="black" stroke-width="2" />
          <path d="M20.9978 10.218L1.00256 9.78178" stroke="black" stroke-width="2" />
        </svg>
      </button>

    </div>
    <div class="project-container">
      <div class="card-project">
        <img src="../assets/projetos.jpg" alt="">
        <div class="preview-content">
          <span class="data-turma">
            2ºC ● 24 de julho, 2021
          </span>
          <h5>Escola mais verde: criando hortas dentro da escola</h5>
          <div class="tags-container"><span class="project-tag">Humanas</span>
            <a href="#">Ver mais <svg width="23" height="10" viewBox="0 0 23 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.8" d="M17 0.5L21.5 5M21.5 5L17 9.5M21.5 5H0" stroke="black" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <div class="card-project">
        <img src="../assets/projetos.jpg" alt="">
        <div class="preview-content">
          <span class="data-turma">2ºC ● 24 de julho, 2021</span>
          <h5>Escola mais verde: criando hortas dentro da escola</h5>
          <div class="tags-container"><span class="project-tag">Humanas</span> <a href="#">Ver mais <svg width="23" height="10" viewBox="0 0 23 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.8" d="M17 0.5L21.5 5M21.5 5L17 9.5M21.5 5H0" stroke="black" />
              </svg></a></div>
        </div>
      </div>

      <div class="card-project">
        <img src="../assets/projetos.jpg" alt="">
        <div class="preview-content">
          <span class="data-turma">2ºC ● 24 de julho, 2021</span>
          <h5>Escola mais verde: criando hortas dentro da escola</h5>
          <div class="tags-container"><span class="project-tag">Humanas</span> <a href="#" <svg width="23" height="10" viewBox="0 0 23 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.8" d="M17 0.5L21.5 5M21.5 5L17 9.5M21.5 5H0" stroke="black" />
              </svg>>Ver mais
            </a></div>
        </div>
      </div>

      <div class="card-project">
        <img src="../assets/projetos.jpg" alt="">
        <div class="preview-content">
          <span class="data-turma">2ºC ● 24 de julho, 2021</span>
          <h5>Escola mais verde: criando hortas dentro da escola</h5>
          <div class="tags-container"><span class="project-tag">Humanas</span> <a href="#">Ver mais <svg width="23" height="10" viewBox="0 0 23 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.8" d="M17 0.5L21.5 5M21.5 5L17 9.5M21.5 5H0" stroke="black" />
              </svg></a></div>
        </div>
      </div>

    </div>


  </div>
</body>

</html>
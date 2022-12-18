<!DOCTYPE html>
<html lang="pt-BR ">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jovem</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
</head>

<body>
  <div id="container">
    <header>
      <span class="logo">Escola jovem <span>.</span></span>
      <input class="search" type="text" placeholder="Descubra...">
    </header>
    <main>
      <nav id="seccondary-nav">
        <ul>
          <li><a href="#">Projetos</a></li>
          <li><a href="#">Filosofia</a></li>
          <li><a href="#">Contato</a></li>
          <li><a href="#">Direção</a></li>
          <li><a href="#">Formandos</a></li>
          <li><a href="#">Professores</a></li>
        </ul>
      </nav>
      <div class="flex-container">
        <div>
          <h1 class="h1">OLÁ, O QUE VAMOS <span class="text-switcher">DESCOBRIR</span>
            HOJE?</h1>
          <div class="carousel-controllers">
            <div class="carousel-controller isCurrentItem"></div>
            <div class="carousel-controller"></div>
            <div class="carousel-controller"></div>
            <button class="goNextPage"><img src="assets/btn-caurousel.svg" alt="Seta para direita"></button>
          </div>
        </div>
        <div class="grid-container">
          <div id="mask-1">
            <img src="assets/img-1.png" alt="">
          </div>

          <div id="mask-2">
            <img src="assets/img-2.png" alt="">
          </div>

          <div id="mask-3">
            <img src="assets/img-4.png" alt="">
          </div>

          <div id="mask-4">
            <img src="assets/img-5.png" alt="">
          </div>




          <svg class="mask">
            <clipPath id="svg-mask-1">
              <rect opacity="0.4" x="250.316" width="354" height="354" rx="64" transform="rotate(45 250.316 0)" fill="#0C0C0C" />
            </clipPath>
          </svg>

          <svg class="mask">
            <clipPath id="svg-mask-2">
              <rect opacity="0.4" x="249.526" y="54" width="260" height="260" rx="64" transform="rotate(45 249.526 54)" fill="#0C0C0C" />
            </clipPath>
          </svg>


          <!-- Criar máscaras.-->
        </div>
      </div>
    </main>
  </div>
</body>

</html>
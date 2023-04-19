<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../css/estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,700;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">



  <title>SódelasStudio</title>
</head>
<body>

  <div class="container1">

<header class="header">
  <div class="logo-header">
 
  </div>

  <div>
    <ul>
      <li><a href="#img-inicio">Inicio</a></li>
      <li><a href="#sobre-nos">Sobre Nós</a></li>
      <li><a href="#section3">Parceiros</a></li>
      <li><a href="../../../paginas/equipe.html">Equipe</a></li>
      <li><a href="../../../paginas/servicos.html">Serviços</a></li>
      <li><a href="#contatos-relogio-loc">Contato</a></li>
    </ul>
  </div>

 <div class="ico-user-header">
    <?php echo "Olá, ".$email ?>
  
 <div><button class="btn-login"><a href="../../Login/logout_usuario.php">Deslogar</a></button></div>

</header>

  <section class="-main-section">
    <div class="img-content" id="img-inicio">
    <img src="../../../img/Roby_Salao_Beleza-3774.png" alt="" class="img-top">

    <h1 class="text-edit">"Transforme sua beleza em uma obra-prima única e<br> deslumbrante em nosso salão de beleza com nossos serviços de <br>alta qualidade e equipe especializada!"</h1>
<button class="btn-img-agendar"><a href="read_servico.php">Agendar Agora</a></button>
    </div>
    <section id="sobre-nos">
<img src="../../../img/Design_sem_nome__3_-removebg-preview.png" alt="" class="flor1">

    </section>
    <section class="text-sob-nos">
      <h1 class="text-h1">Sobre nós</h1>
      <br>
      <div class="sublinhado"></div>
      <h3 class="text-h3">Veja um pouquinho de nossa história</h3>


    </section>
    <div class="flor2"> <img src="../../../img/Design_sem_nome__1_-removebg-preview.png" alt=""></div>
     
    <div class="text-sobre-nos">
      <p>    Há alguns anos atrás, quatro mulheres se conheceram em um curso de cabeleireiras no Senac. Elas rapidamente perceberam que tinham muitas coisas em comum, incluindo a paixão pela beleza e o desejo de construir algo próprio. Depois de se formarem no curso, as quatro mulheres, chamadas Juliana, Gilda, Natália e Prisciane, começaram a trabalhar em salões de beleza diferentes. No entanto, elas mantiveram contato e continuaram a conversar sobre suas ambições de abrir um negócio próprio. <br><br>

        Um dia então, as quatro mulheres decidiram que era hora de seguir em frente com seu sonho de abrir um estúdio de beleza para todos. Elas queriam criar um espaço acolhedor e luxuoso onde seus clientes, principalmente as mulheres, pudessem se sentir bonitas e confiantes. <br><br>
 
      Elas obtiveram então, informações sobre como iniciar um negócio e elaboraram um plano de negócios detalhado. Depois de muitas reuniões, pesquisas e esforços, elas finalmente conseguiram abrir seu próprio estúdio de beleza, que chamaram de Studios SóDelas. Com esforço e trabalhando juntas, oferecem serviços de alta qualidade em cabelos, maquiagens e cuidados com a pele. <br><br>
 
         O Studios SóDelas se tornou um sucesso entre as mulheres da região e o negócio cresceu rapidamente. Hoje, o estúdio é um dos mais conhecidos e respeitados da cidade, com clientes fiéis e uma equipe de profissionais talentosos. <br><br>
 
       As fundadoras do Studios SóDelas são orgulhosas do que construíram juntas e continuam trabalhando duro para manter a qualidade e a excelência que tornaram seu negócio um sucesso.
 </p>
    </div>
    <div class="btn-conheca-equipe">
      <button class="btn-conheca">Conheça Nossa Equipe</button>
    </div>
    <br><br><br><br>
    <div class="cards-servicos">
      <div class="text-card">
         <h1 class="text-top-card">Serviços</h1>
       <div class="sublinhado2"></div>
        </div>
      
        <div id="container">
          <div id="slider-container">
            <span onclick="slideRight()" class="btn"></span>
              <div id="slider">
                <div class="slide">
                  <div class="card">
                  <div class="img-card"><img src="../../../img/icone-de-menina-com-cabelos-longos-ondulados-cuidados-com-o-cabelo-gradiente-rosa-e-cabeleireiro-feminino_542399-666-removebg-preview (1).png" alt="" class="img-card-edit"></div>
                  <h1 class="text-h1-card">Cabelos</h1><br>
                  <h3 class="text-h3-card">Transforme seu visual com nossos serviços de cabelo personalizados.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div>
              </div>

                <div class="slide"> <div class="card">
                  <div class="img-card"><img src="../../../img/maquiagem.png" alt="" class="img-card-edit"></div>
                  <h1 class="text-h1-card">Maquiagem</h1><br>
                  <h3 class="text-h3-card">Deixe sua beleza brilhar com nossos serviços de maquiagem exclusivos.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div></div>
                <div class="slide"> <div class="card">
                  <div class="img-card"><img src="../../../img/estetica.png" class="img-card-edit img1"></div>
                  <h1 class="text-h1-card">Estética</h1><br>
                  <h3 class="text-h3-card">Relaxe e revitalize sua pele com nossos serviços de estética.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div></div>
                <div class="slide"> <div class="card">
                  <div class="img-card"><img src="../../../img/icones-de-depilacao-feminina-1024x243.png" alt="" class="img-card-edit"></div>
                  <h1 class="text-h1-card">Depilação</h1><br>
                  <h3 class="text-h3-card">Tenha uma pele suave e sedosa com nossos serviços de depilação.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div></div>
                <div class="slide"> <div class="card">
                  <div class="img-card"><img src="../../../img/icone-de-menina-com-cabelos-longos-ondulados-cuidados-com-o-cabelo-gradiente-rosa-e-cabeleireiro-feminino_542399-666-removebg-preview (1).png" alt="" class="img-card-edit"></div>
                  <h1 class="text-h1-card">Cabelos</h1><br>
                  <h3 class="text-h3-card">Transforme seu visual com nossos serviços de cabelo personalizados.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div></div>
                <div class="slide"> <div class="card">
                  <div class="img-card"><img src="../../../img/icone-de-menina-com-cabelos-longos-ondulados-cuidados-com-o-cabelo-gradiente-rosa-e-cabeleireiro-feminino_542399-666-removebg-preview (1).png" alt="" class="img-card-edit"></div>
                  <h1 class="text-h1-card">Cabelos</h1><br>
                  <h3 class="text-h3-card">Transforme seu visual com nossos serviços de cabelo personalizados.</h3>
          <br><br>
          <div class="saiba-mais"> <a href=""class="acapulco">Saiba mais...</a></div>
                 </div></div>
                
            </div>
            <span onclick="slideLeft()" class="btn"></span>
          </div>
        </div>



    </div>
    <script>var container = document.getElementById('container')
      var slider = document.getElementById('slider');
      var slides = document.getElementsByClassName('slide').length;
      var buttons = document.getElementsByClassName('btn');
      
      
      var currentPosition = 0;
      var currentMargin = 0;
      var slidesPerPage = 0;
      var slidesCount = slides - slidesPerPage;
      var containerWidth = container.offsetWidth;
      var prevKeyActive = false;
      var nextKeyActive = true;
      
      window.addEventListener("resize", checkWidth);
      
      function checkWidth() {
          containerWidth = container.offsetWidth;
          setParams(containerWidth);
      }
      
      function setParams(w) {
          if (w < 551) {
              slidesPerPage = 1;
          } else {
              if (w < 901) {
                  slidesPerPage = 2;
              } else {
                  if (w < 1101) {
                      slidesPerPage = 3;
                  } else {
                      slidesPerPage = 4;
                  }
              }
          }
          slidesCount = slides - slidesPerPage;
          if (currentPosition > slidesCount) {
              currentPosition -= slidesPerPage;
          };
          currentMargin = - currentPosition * (100 / slidesPerPage);
          slider.style.marginLeft = currentMargin + '%';
          if (currentPosition > 0) {
              buttons[0].classList.remove('inactive');
          }
          if (currentPosition < slidesCount) {
              buttons[1].classList.remove('inactive');
          }
          if (currentPosition >= slidesCount) {
              buttons[1].classList.add('inactive');
          }
      }
      
      setParams();
      
      function slideRight() {
          if (currentPosition != 0) {
              slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
              currentMargin += (100 / slidesPerPage);
              currentPosition--;
          };
          if (currentPosition === 0) {
              buttons[0].classList.add('inactive');
          }
          if (currentPosition < slidesCount) {
              buttons[1].classList.remove('inactive');
          }
      };
      
      function slideLeft() {
          if (currentPosition != slidesCount) {
              slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
              currentMargin -= (100 / slidesPerPage);
              currentPosition++;
          };
          if (currentPosition == slidesCount) {
              buttons[1].classList.add('inactive');
          }
          if (currentPosition > 0) {
              buttons[0].classList.remove('inactive');
          }
      };</script>


  </section>
  <div id="section3"></div>
  <br><br><br><br><br><br><br><br><br><br><br>
  <footer class="footer">
    <section id="fundo-rosa">
      <div class="flor-1">
        <img src="../../../img/Design_sem_nome__3_-removebg-preview.png" alt="" class="flor-1-parcerias">
      </div>
      <div class="text-parceria">
        
        <h1 class="text-parceria-top">Parceiros</h1>
        <div class="sublinhado3"></div>
      </div>
<div class="imgs-parceria">
 <img src="../../../img/aVON.png" alt="" class="img-avon">
 <img src="../../../img/natura-novo_logo1.png" alt="" class="img-natura">
 <img src="../../../img/logo-pantene-512.png" alt="" class="img-pantene">
</div>
<div class="flor-2-parcerias"><img src="../../../img/flor4.png" alt=""></div>
    </section>
  
  <br><br><br>
<section id="contatos-relogio-loc">
  <div class="contatos">
    <img src="../../../img/contatos.png" alt="" class="contatos-img">
    <br><br>
    <p class="text-contato1">Contato:</p>
    <p class="text-contato2">Tel.: (21 9999 9999)</p>
  </div>
 
<div class="relogio"></div>
<img src="../../../img/relogio.png" alt="" class="relogio-img">
<p class="text-relogio1">Horário de funcionamento</p>
<p class="text-relogio2">Segunda a Sábado</p>
<p class="text-relogio3">9:00h às 19:00h</p>

<br>
  <div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.0798290705693!2d-43.45241898442105!3d-22.76241853845944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99670406251cd9%3A0x7a731a5987b46624!2sR.%20Humberto%20Gentil%20Baroni%2C%20189%20-%20Centro%2C%20Nova%20Igua%C3%A7u%20-%20RJ%2C%2026255-020!5e0!3m2!1spt-BR!2sbr!4v1681176419953!5m2!1spt-BR!2sbr" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <p class="text-mapa1">Localização:</p>
  <p class="text-mapa2">R. Humberto Gentil Baroni, 189 - Centro</p>
  <p class="text-mapa3"> Nova Iguaçu - RJ, 26255-020</p>
  </div>
  <div class="btn-agendar-footer">
    <button class="btnfooter">Agendamento</button>

  </div>
  <br><br>
  <div class="rodape">
    <p class="text-footer">Site criado por alunos do SENAC, é apenas um projeto</p>
  </div>
 
</section>
<script></script>
</html>

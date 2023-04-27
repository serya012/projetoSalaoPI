<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../css/estilo.css">
  <link rel="stylesheet" href="../../../css/estiloMenu.css">
  <link rel="stylesheet" href="../../../css/estiloServ.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,700;1,100;1,200;1,300;1,400&display=swap"
    rel="stylesheet">
    
    <title>SódelasStudio</title>
</head>

<body>
  <header>
    <nav>
      <img class="logo" src="../../../img/logo.png" alt="logo">
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a class="a1" href="indexlogado.php">Início</a></li>
        <li><a class="a1" href="indexlogado.php">Sobre nós</a></li>
        <li><a class="a1" href="../../../paginas/servicos_logado.html">Serviços</a></li>
        <li><a class="a1" href="indexlogado.php">Parceiros</a></li>
        <li><a class="a1" href="../../../paginas/equipe_logado.html">Equipe</a></li>
        <li><a class="a1" href="indexlogado.php">Contato</a></li>

      </ul>

      <div class="ico-login">
        <a href="../../Form/Usuario/read_agenda.php"><img src="../../../img/iconeLogin1.png" alt=""></a>


        <div class="btn-login">
          <button><a href="../../Login/logout_usuario.php">Logout</a></button>

        </div>
      </div>


    </nav>

  </header>

  <main>
    <div class="content1">
      <picture>
        <img src="../../../img/salao1.png" alt="salao">
      </picture>
      <a href="read_servico.php"><button type="button"><span>Agende Agora</span></button></a>
    </div>
    <div class="content2">
      <picture class="img1content2">
        <img src="../../../img/imgcontent2t.png" alt="sobrenós">
      </picture>
    </div>
    <div class="contentText">
      <div class="textlocal1">
        <p> Há alguns anos atrás, quatro mulheres se conheceram em um curso de cabeleireiras no Senac. Elas rapidamente
          perceberam que tinham muitas coisas em comum, incluindo a paixão pela beleza e o desejo de construir algo
          próprio. Depois de se formarem no curso, as quatro mulheres, chamadas Juliana, Gilda, Natália e Prisciane,
          começaram a trabalhar em salões de beleza diferentes. No entanto, elas mantiveram contato e continuaram a
          conversar sobre suas ambições de abrir um negócio próprio. <br><br>

          Um dia então, as quatro mulheres decidiram que era hora de seguir em frente com seu sonho de abrir um estúdio
          de
          beleza para todos. Elas queriam criar um espaço acolhedor e luxuoso onde seus clientes, principalmente as
          mulheres, pudessem se sentir bonitas e confiantes. <br><br>

          Elas obtiveram então, informações sobre como iniciar um negócio e elaboraram um plano de negócios detalhado.
          Depois de muitas reuniões, pesquisas e esforços, elas finalmente conseguiram abrir seu próprio estúdio de
          beleza, que chamaram de Studios SóDelas. Com esforço e trabalhando juntas, oferecem serviços de alta qualidade
          em cabelos, maquiagens e cuidados com a pele. <br><br>

          O Studios SóDelas se tornou um sucesso entre as mulheres da região e o negócio cresceu rapidamente. Hoje, o
          estúdio é um dos mais conhecidos e respeitados da cidade, com clientes fiéis e uma equipe de profissionais
          talentosos. <br><br>

          As fundadoras do Studios SóDelas são orgulhosas do que construíram juntas e continuam trabalhando duro para
          manter a qualidade e a excelência que tornaram seu negócio um sucesso.
        </p>
      </div>
    </div>
    <div class="conhecaEquipe"><a href="../../../paginas/equipe_logado.html"><button type="button" class="btn-conheca-equipe"><span>Conheça nossa
            equipe</span></button></a></div>

    <div class="servicos1">
      <div class="servicosdesc">
        <h1>Alguns de Nossos Serviços</h1>
      </div>
      <div id="sublinhado-servi"></div>
      <div class="servicos1baixo">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">

            <div class="card swiper-slide">
              <div class="card__image">
                <img src="../../../img/corte1.jpg" alt="card image">
              </div>

              <div class="card__content">
                <span class="card__title">Cabelos</span>
                <span class="card__name"></span>
                <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore
                  provident non tempora odio est sunt, ipsum</p>
                <a href="../../../paginas/servicos_logado.html"><button class="card__btn">Veja mais</button></a>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="card__image">
                <img src="../../../img/marquiagem1.PNG" alt="card image">
              </div>

              <div class="card__content">
                <span class="card__title">Maquiagem</span>
                <span class="card__name"></span>
                <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore
                  provident non tempora odio est sunt, ipsum</p>
                  <a href="../../../paginas/servicos_logado.html"><button class="card__btn">Veja mais</button></a>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="card__image">
                <img src="../../../img/estetica1.jpg" alt="card image">
              </div>

              <div class="card__content">
                <span class="card__title">Estética</span>
                <span class="card__name"></span>
                <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore
                  provident non tempora odio est sunt, ipsum</p>
                  <a href="../../../paginas/servicos_logado.html"><button class="card__btn">Veja mais</button></a>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="card__image">
                <img src="../../../img/ciliosesombran.jpg" alt="card image">
              </div>

              <div class="card__content">
                <span class="card__title">Cílios e Sombrancelhas</span>
                <span class="card__name"></span>
                <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore
                  provident non tempora odio est sunt, ipsum</p>
                  <a href="../../../paginas/servicos_logado.html"><button class="card__btn">Veja mais</button></a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="rodape">
    <div class="espacamentoRoda"></div>
    <div class="imgRoda">
      <img src="../../../img/parceiros.png" alt="">
    </div>
    <div class="real-rodape">
      <div class="contatoroda">
        <picture>
          <img src="../../../img/contatos.png" alt="contato">
        </picture>
        <div class="contato1">
          <h3>Contato</h3>
        </div>
        <div class="tel1">
          <h3>Tel: (21)9999-9999</h3>
        </div>
      </div>
      <div class="horario">
        <picture>
          <img src="../../../img/relogio.png" alt="relogio">
        </picture>
        <div class="horafunci1">
          <h3>Horários de funcionamento</h3>
        </div>
        <div class="horafunci2">
          <h3>De segunda a sábado<br>9:00 ás 19:00h</h3>
        </div>
      </div>
      <div class="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.079829224956!2d-43.452805223726806!3d-22.762418532729274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99670406251cd9%3A0x7a731a5987b46624!2sR.%20Humberto%20Gentil%20Baroni%2C%20189%20-%20Centro%2C%20Nova%20Igua%C3%A7u%20-%20RJ%2C%2026255-020!5e0!3m2!1spt-BR!2sbr!4v1682388760065!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="loc">
          <h3>Localização</h3>
        </div>
        <div class="loc2">
          <h5>. Humberto Gentil Baroni, 189 - Centro, Nova Iguaçu - RJ, 26255-020</h5>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="js/mobilenavbar.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 300,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>

</html>
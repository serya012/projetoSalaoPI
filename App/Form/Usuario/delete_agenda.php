<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
<link rel="stylesheet" href="../../../css/estiloMenuUsu.css">
    <title>Excluir Funcionário</title>
</head>
<body>
<header class="header">
    <nav>
      <img class="logo" src="../../../img/logo.png" alt="logo">
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a class="a1" href="index.html">Início</a></li>
        <li><a class="a1" href="#sobre-nos">Sobre nós</a></li>
        <li><a class="a1" href="./paginas/servicos.html">Serviços</a></li>
        <li><a class="a1" href="#pcr">Parceiros</a></li>
        <li><a class="a1" href="./paginas/equipe.html">Equipe</a></li>
        <li><a class="a1" href="#">Contato</a></li>
      </ul>
      <div class="ico-login">
        <a href="App/Login/login_usuario.php"><img src="../../../img/iconeLogin1.png" alt=""></a>
        <div class="btn-login">
          <button><a href="App/Login/login_usuario.php">Logout</a></button>
        </div>
      </div>
    </nav>
  </header>
  <section class="subHeader">
    <div class="caixaSubHeader">
    <ul>
      <li><a href="read_agenda.php">Agenda</a></li>
      <li><a href="read_servico.php">Serviços</a></li>
    </ul>
  </div>
  </section>
    <div class="container">
    <div class="display-3">Tem certeza que deseja desmarcar?</div>
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <form action="" method="post">
        <a href="read_agenda.php"><button type="button" class="btn btn-secondary" title="Não Excluir">Não</button></a>
        <button type="submit" class="btn btn-danger"  title="Excluir Funcionário" name="confirmar">Sim</button>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['confirmar'])) {

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\agenda.php';
    require_once '..\..\Model\agendaDao.php';

    $id = intval($_GET['cod_agenda']);
    $funcionario = new \App\Model\agenda();
    $agendaDao = new \App\Model\agendaDao();
    $agendaDao->delete($id);
    header('Location: read_agenda.php');
    }
?>
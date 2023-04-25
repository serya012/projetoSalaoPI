<?php
    session_start();
        $logado = $_SESSION['usuario'];

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\agenda.php';
    require_once '..\..\Model\agendaDao.php';

    $agenda = new \App\Model\agenda();
    $agendaDao = new \App\Model\agendaDao();
    try {
        $agendaDao->read();
    } catch(\PDOException $e){
        echo 'Erro: no read_agenda.php - verificar tabela '.$e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">    
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <title>Consultar Serviços</title>
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
        <a href="../../Login/logout_usuario.php"><img src="../../../img/iconeLogin1.png" alt=""></a>
        <div class="btn-login">
          <button><a href="../../Login/login_usuario.php">Logout</a></button>
        </div>
      </div>
    </nav>
  </header>


 <div class="container">
 <br><br><br>
    <div class="row h6 bg-secondary">
        <div class="col-3">Código Usuario</div>
        <div class="col-3">Id Serviço</div>
        <div class="col-1">Hora</div>
        <div class="col-3">Data</div>
        <div class="col">Ações</div>
    </div>
    <?php //Precisa fazer mostrar apenas os agendamentos referentes ao Usuário
        foreach ($agendaDao->read() as $agenda):
            echo ('<div class="row">
                    <div class="col-3">'.$agenda["id_usuario"].'</div>
                    <div class="col-3">'.$agenda["id_servico"].'</div>
                    <div class="col-1">'.$agenda["hora_agenda"].'</div>
                    <div class="col-3">'.$agenda["data_agenda"].'</div>
                    <div class="col">
                        <a href="delete_agenda.php?cod_agenda='.$agenda["cod_agenda"].'"><button type="button" class="btn btn-light" title="Excluir agenda">Desmarcar</button></a>
                    </div>
                   </div>'
                );          
        endforeach;
    ?>
 </div>                
</body>
</html>
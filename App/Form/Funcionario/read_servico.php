<?php
   
    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\servico.php';
    require_once '..\..\Model\servicoDao.php';

    $servico = new \App\Model\servico();
    $servicoDao = new \App\Model\servicoDao();
    try {
        $servicoDao->read();
    } catch(\PDOException $e){
        echo 'Erro: no read_servico.php - verificar tabela '.$e->getMessage();
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
    <style>
        .container{
            padding-top: 80px;
        }
    </style>
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
        <a href="../../Login/logout_funcionario.php"><img src="../../../img/iconeLogin1.png" alt=""></a>
        <div class="btn-login">
          <button><a href="../../Login/login_funcionario.php">Logout</a></button>
        </div>
      </div>
    </nav>
  </header>    

    <a href="create_servico.php"><button>Criar</button></a>
 <div class="container">
    <div class="row h6 " style="margin-top:9vh; padding:20px; background-color:#f7c375;">
        <div class="col-1">Tipo</div>
        <div class="col-3">Serviço</div>
        <div class="col-3">Descrição</div>
        <div class="col-3">Valor</div>
        <div class="col">Ações</div>
    </div>
    <?php
        foreach ($servicoDao->read() as $servico):
            echo ('<div class="row">
                    <div class="col-1">'.$servico["tipo_de_servico"].'</div>
                    <div class="col-3">'.$servico["servico"].'</div>
                    <div class="col-3">'.$servico["descricao"].'</div>
                    <div class="col-3">'.$servico["valor"].'</div>
                    <div class="col">
                        <a href="update_servico.php?id_servico='.$servico["id_servico"].'"><button type="button" class="btn btn-light" title="Editar servico">Editar</button></a>
                        <a href="delete_servico.php?id_servico='.$servico["id_servico"].'"><button type="button" class="btn btn-light" title="Excluir servico">Excluir</button></a>
                    </div>
                   </div>'
                );          
        endforeach;
    ?>
 </div>                
</body>
</html>
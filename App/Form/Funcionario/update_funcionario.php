<?php

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\funcionario.php';
    require_once '..\..\Model\funcionarioDao.php';

    $id = intval($_GET['id_funcionario']);
    $funcionario = new \App\Model\funcionario();
    $funcionarioDao = new \App\Model\funcionarioDao();
   
 
    if(count($_POST) > 0) {

        
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $funcao = $_POST['funcao'];
        
    
            $funcionario->setIdF($id);
            $funcionario->setNomeF($nome);
            $funcionario->setCpfF($cpf);
            $funcionario->setTelefoneF($telefone);
            $funcionario->setEmailF($email);
            $funcionario->setEndereco($endereco);
            $funcionario->setFuncao($funcao);
            
            $funcionarioDao->update($funcionario);

            echo "<p><b>Funcionário atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../../../css/estiloMenuFunc.css">
    <title>Editar Funcionário</title>
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
        <li><a class="a1" href="read_agenda.php">Agenda</a></li>
        <li><a class="a1" href="read_funcionario.php">Funcionários</a></li>
        <li><a class="a1" href="read_servico.php">Serviços</a></li>
      </ul>

      <div class="ico-login">
        <a href="../../Login/logout_funcionario.php"><img src="../../../img/iconeLogin1.png" alt=""></a>
        <div class="btn-login">
          <button><a href="../../Login/login_funcionario.php">Logout</a></button>
        </div>
      </div>
    </nav>
  </header>
  <div class="espacamento"></div>
    <div class="container">
    
    <form method="POST" action="">
    <?php
       foreach ($funcionarioDao->readUpdate($id) as $funci): ?>
            <div class="form-group">
                <label>Nome Completo:</label>
                <input value="<?php echo $funci['nome_funcionario']; ?>" type="text" name="nome" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>CPF:</label><br>
                <input class="cpf" value="<?php echo $funci['cpf_funcionario']; ?>" type="text" name="cpf" class="cpf" class="form-control " required>
            </div>
            <div class="form-group">
                <label>Telefone:</label><br>
                <input class="telefone" value="<?php echo $funci['telefone_funcionario']; ?>" type="text" name="telefone" class="telefone" class="form-control">
                
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input value="<?php echo $funci['email_funcionario']; ?>" type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Endereço:</label>
                <input value="<?php echo $funci['endereco']; ?>" type="text" name="endereco" class="form-control">

            <div class="form-group">
                <label>Função:</label>
                <input value="<?php echo $funci['funcao']; ?>" type="text" name="funcao" class="form-control">
            </div>
    <?php
        endforeach;
    ?>
        <button type="submit" class="btn btn-light" title="Gravar atualização">Salvar Alterações</button>
        <a href="read_funcionario.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>
        </p>
        
       
    </form>
    </div>

    <script type= "text/javascript" src="../../../js/jquery-3.6.4.js"></script>
    <script type= "text/javascript" src="../../../js/jquery.mask.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            $('.telefone').mask('(00)00000-0000');
            $('.cpf').mask('000.000.000-00');
       }); 
    </script>
    
    </script>
</body>
</html>
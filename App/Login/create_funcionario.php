<?php
$nome = $cpf = $data = $telefone = $email = $senha = $confirma = $endereco = $funcao = "";
$nome_err = $cpf_err = $data_err = $telefone_err = $email_err = $senha_err = $confirma_err = $endereco_err = $funcao_err = "";


if (isset($_POST["gravar"])){

    require_once '..\Model\conexao.php';
    require_once '..\Model\funcionario.php';
    require_once '..\Model\funcionarioDao.php';
    
            
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data = $_POST['data'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
        $funcao = $_POST['funcao'];
        $nivel = 2;
       
        

        $funcionario = new \App\Model\Funcionario();
        $funcionario->setNomeF($nome);
        $funcionario->setCpfF($cpf);
        $funcionario->setDataF($data);
        $funcionario->setTelefoneF($telefone);
        $funcionario->setEmailF($email);
        $funcionario->setSenhaF($senha);
        $funcionario->setEndereco($endereco);  
        $funcionario->setFuncao($funcao); 
        $funcionario->setNivel($nivel); 
        $funcionarioDao = new \App\Model\FuncionarioDao();
        if ($funcionarioDao->create($funcionario)){
            $cpf_err = "CPF já cadastrado no sistema.";
        } else{
            echo '<script>alert("Usuário cadastrado com sucesso!")</script>';
            $nome = $cpf = $data = $telefone = $email = $senha = $endereco = $funcao = "";
        }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloCadastroF.css">
    <link rel="stylesheet" href="../../css/estiloMenu.css">
    <title>Cadastro SóDelas</title>
</head>
<body>
<header>
    <nav>
      <img class="logo" src="../../img/logo.png" alt="logo" >
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a class="a1" href="../../index.php">Início</a></li>
        <li><a class="a1" href="../../index.php">Sobre nós</a></li>
        <li><a class="a1" href="../../paginas/servicos.html">Serviços</a></li>
        <li><a class="a1" href="../../index.php">Parceiros</a></li>
        <li><a class="a1" href="../../paginas/equipe.html">Equipe</a></li>
        <li><a class="a1" href="../../index.php">Contato</a></li>
        <li><a class="a1" href="login_funcionario.php">Login</a></li>
      </ul>
    </nav>
  </header>


<div class="container1">
    <div class="container">

        <div class="form-image">
          <img src="../../img/undraw_woman_ffrd (1).svg" alt="">
        </div>
        <div class="form">
          <form action="" method="POST">
            <div class="form-header">
              <div class="tittle">
                <h1>Cadastrar Funcionário</h1>
              </div>
              <div class="login-button">
                <button><a href="login_funcionario.php">Entrar</a></button>
              </div>
            </div>
    
            <div class="input-group">
              <div class="input-box">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" class="inputUser <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>" required>
                <span class="invalid-feedback"><?php echo $nome_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu E-mail" class="inputUser <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(xx) xxxxx-xxxx" class="inputUser <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>" required>
                <span class="invalid-feedback"><?php echo $telefone_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" class="inputUser <?php echo (!empty($cpf_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpf; ?>" required>
                <span class="invalid-feedback"><?php echo $cpf_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" class="inputUser <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $senha; ?>" required>
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="confirma">Confirmar senha</label>
                <input type="password" id="confirma" name="confirma" placeholder="Confirme sua senha" class="inputUser <?php echo (!empty($confirma_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirma; ?>" required>
                <span class="invalid-feedback"><?php echo $confirma_err; ?></span>
              </div>

              <div class="input-box teste">
                <label for="data">Data de Nascimento</label>
                <input type="date" id="data" name="data" placeholder="Digite a data de seu nascimento" class="inputUser <?php echo (!empty($data_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data; ?>" required>
                <span class="invalid-feedback"><?php echo $data_err; ?></span>
              </div>

              <div class="input-box">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" placeholder="Confirme sua senha" class="inputUser <?php echo (!empty($endereco_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $endereco; ?>" required>
                <span class="invalid-feedback"><?php echo $endereco_err; ?></span>
              </div>

              <div class="input-box">
                <label for="funcao">Função</label>
                <input type="text" id="funcao" name="funcao" placeholder="Confirme sua senha" class="inputUser <?php echo (!empty($funcao_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $funcao; ?>" required>
                <span class="invalid-feedback"><?php echo $funcao_err; ?></span>
              </div>
            </div>
    
            <div class="continue-button">
              <button type="submit" name="gravar"><a href="">Cadastrar</a></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type= "text/javascript" src="../../js/jquery-3.6.4.js"></script>
    <script type= "text/javascript" src="../../js/jquery.mask.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            $('#telefone').mask('(00)00000-0000');
            $('#cpf').mask('000.000.000-00');
       }); 
    </script>
</body>
</html>
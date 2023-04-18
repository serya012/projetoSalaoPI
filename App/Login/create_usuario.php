<?php
$nome = $cpf = $telefone = $email = $senha = $confirma = "";
$nome_err = $cpf_err = $telefone_err = $email_err = $senha_err = $confirma_err = "";


if (isset($_POST["gravar"])){

    require_once '..\Model\conexao.php';
    require_once '..\Model\usuario.php';
    require_once '..\Model\usuarioDao.php';
    
    
            
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
        $nivel = 1;
       
        

        $usuario = new \App\Model\Usuario();
        $usuario->setNomeU($nome);
        $usuario->setEmailU($email);
        $usuario->setTelefoneU($telefone);
        $usuario->setCpfU($cpf);
        $usuario->setSenhaU($senha); 
        $usuario->setNivel($nivel); 
        $usuarioDao = new \App\Model\UsuarioDao();
        if ($usuarioDao->create($usuario)){
            $cpf_err = "CPF já cadastrado no sistema.";
        } else{
            echo '<script>alert("Usuário cadastrado com sucesso!")</script>';
            $nome = $cpf = $telefone = $email = $senha = "";
        }
  }


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/estiloCadastroU.css">
  <link rel="stylesheet" href="../../css/estiloMenu.css">
  <title>Cadastro Teste</title>
</head>

<body>
<header class="header">
    <div class="logo-header">
   
    </div>
  
    <div class="lista">
      <ul>
        <li><a href="#img-inicio">Inicio</a></li>
        <li><a href="#sobre-nos">Sobre Nós</a></li>
        <li><a href="#section3">Parceiros</a></li>
        <li><a>Equipe</a></li>
        <li><a>Serviços</a></li>
        <li><a href="#contatos-relogio-loc">Contato</a></li>
      </ul>
    </div>
  
    <!--
  
      codigo ryan
  
    <div class="btn-group">
      <a href="index.html">  <button class="btn btn1">Inicio</button></a>
      <a href="#sobre-nos"> <button class="btn btn2">Sobre nós</button></a>
    <a href="#fundo-rosa"><button class="btn btn3">Parceiros</button></a>
    <button class="btn btn4">Equipe</button>
    <button class="btn btn5">Serviços</button>
    <a href="#contatos-relogio-loc"><button class="btn btn6">Contatos</button></a>
    
  </div>
  -->
  <div class="ico-user-header">
    <img src="../../img/iconeLogin1.png" alt="ico-user" class="ico-img">
    
  <div> <button class="btn-login">Login</button></div>
</div>
  
  
    
   
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
            <h1>Cadastre-se</h1>
          </div>
          <div class="login-button">
            <button><a href="">Entrar</a></button>
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
        </div>

        <div class="continue-button">
          <button type="submit" name="gravar"><a href="">Continuar</a></button>
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

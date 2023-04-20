<?php

require_once '..\Model\conexao.php';
require_once '..\Model\funcionario.php';
require_once '..\Model\funcionarioDao.php';

$email = $senha =  "";
$email_err = $senha_err =  "";

 

$funcionario = new \App\Model\Funcionario();
$funcionarioDao = new \App\Model\FuncionarioDao();
   
if(isset($_POST['buscar'])){

    if(empty(trim($_POST["email"])) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $email_err = "Por favor coloque um email válido!";
        $email = $_POST["email"];
    } elseif(empty(trim($_POST["senha"])) || strlen($_POST["senha"])<8){   
        $email = $_POST["email"];
        $senha_err = "Por favor coloque uma senha válida!";
    } else { 
        $email = $_POST["email"];
        $senha = $_POST['senha'];

        $funcionario->setEmailF($email);
        $funcionario->setSenhaF($senha);
        
        if ($funcionarioDao->localizarF($funcionario)) {
            if(!isset($_SESSION)) session_start();
            $_SESSION['funcionario'] = $funcionario->getEmailF();
            $_SESSION['id_funcionario'] = $funcionario->getIdF();
            $_SESSION['nivel'] = $funcionarioDao->buscarNivel($funcionario);
            header('Location: ../Form/read_agenda.php'); 
        } else {
            $senha_err = "Email ou senha incorretos";
        }
    }
 }

?>
    
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloLoginF.css">
    <link rel="stylesheet" href="../../css/estiloMenu.css">
    <title>login</title>
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
        <li><a class="a1" href="paginas/servicos.html">Serviços</a></li>
        <li><a class="a1" href="../../index.php">Parceiros</a></li>
        <li><a class="a1" href="paginas/equipe.html">Equipe</a></li>
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
          <form action="">
            
            <div class="form-header">
              <div class="tittle">
                <h1>Login</h1>
              </div>
              <div class="login-button">
                <button><a href="create_funcionario.php">Cadastrar-se</a></button>
              </div>
            </div>
              <div class="input-box">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu E-mail" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
              </div>
    
              <div class="input-box">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
              </div>
    
            <div class="continue-button">
              <button><a href="">Entrar</a></button>
            </div>
        
          </form>
        </div>
      </div>
    </div>
</body>
</html>

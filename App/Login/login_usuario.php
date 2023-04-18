<?php

require_once '..\Model\conexao.php';
require_once '..\Model\usuario.php';
require_once '..\Model\usuarioDao.php';

$email = $senha =  "";
$email_err = $senha_err =  "";

 

$usuario = new \App\Model\Usuario();
$usuarioDao = new \App\Model\UsuarioDao();
   
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

        $usuario->setEmailU($email);
        $usuario->setSenhaU($senha);
        
        if ($usuarioDao->localizar($usuario)) {
            if(!isset($_SESSION)) session_start();
            $_SESSION['usuario'] = $usuario->getEmailU();
            $_SESSION['nivel'] = $usuarioDao->buscarNivel($usuario);
            header('Location: ../Form/read_produtos.php'); 
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
    <link rel="stylesheet" href="../../css/estiloLoginU.css">
    <link rel="stylesheet" href="../../css/estiloMenu.css">
    <title>login</title>
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
          <form action="">
            
            <div class="form-header">
              <div class="tittle">
                <h1>Login</h1>
              </div>
              <div class="login-button">
                <button><a href="">Cadastrar-se</a></button>
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
              <button><a href="">Continuar</a></button>
            </div>
        
          </form>
        </div>
      </div>
      </div>
</body>
</html>

<?php

require_once '..\Model\conexao.php';
require_once '..\Model\usuario.php';
require_once '..\Model\usuarioDao.php';

$email = $senha =  "";
$email_err = $senha_err =  "";

 

$usuario = new \App\Model\Usuario();
$usuarioDao = new \App\Model\UsuarioDao();
   
if(isset($_POST['buscar'])){

        $email = $_POST["email"];
        $senha = $_POST['senha'];

        $usuario->setEmailU($email);
        $usuario->setSenhaU($senha);
        
        if ($usuarioDao->localizar($usuario)) {

            if(!isset($_SESSION)) session_start();

            $_SESSION['usuario'] = $usuario->getEmailU();
            $_SESSION['id_usuario'] = $usuario->getIdU();
            echo $_SESSION['id_usuario']; 
            $_SESSION['nivel'] = $usuarioDao->buscarNivel($usuario);
           //header('Location: ../Form/create_agenda.php'); 
        } else {
            $senha_err = "Email ou senha incorretos";
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
    <title>login</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
          <img src="../../img/undraw_woman_ffrd (1).svg" alt="">
        </div>
        <div class="form">
          <form action="" method="POST">
            
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
              <button type="submit" name="buscar"><a>Continuar</a></button>
            </div>
        
          </form>
        </div>
      </div>
</body>
</html>

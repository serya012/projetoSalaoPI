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
            $_SESSION['nivel'] = $funcionarioDao->buscarNivel($funcionario);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

  <div class="container">
        <h2>Logo</h2>      
         <form action="" method="post">
            <div class="form-group">
                <label>Email: </label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>
            <p></p>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" name="buscar">
            </div>
            
        </form>
    </div>    
</body>
</html>

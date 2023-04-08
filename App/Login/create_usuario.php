<?php
$nome = $cpf = $telefone = $email = $senha = $confirma = "";
$nome_err = $cpf_err = $telefone_err = $email_err = $senha_err = $confirma_err = "";


if (isset($_POST["gravar"])){

    require_once '..\Model\conexao.php';
    require_once '..\Model\usuario.php';
    require_once '..\Model\usuarioDao.php';
    
    if(empty(trim($_POST["nome"])) || strlen($_POST["nome"])<8){   
        $nome_err = "O nome precisa ser preenchido com no mínimo 8 caracteres.";
    } elseif(empty(trim($_POST["cpf"])) || strlen($_POST["cpf"])<11){   
        $cpf_err = "Insira um CPF válido.";
    } elseif(empty(trim($_POST["telefone"])) || strlen($_POST["telefone"])<11){   
        $telefone_err = "O telefone tem que ser válido.";
    } elseif(empty(trim($_POST["email"])) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $email_err = "Por favor coloque um email válido para o nome de usuário.";
    } elseif(empty(trim($_POST["senha"])) || strlen($_POST["senha"])<8){   
        $senha_err = "A senha precisa ser preenchida com no mínimo 8 caracteres.";
    } elseif($_POST['senha'] != $_POST['confirma']) {
        $confirma_err = 'As duas senhas devem ser iguais!';
    } 
    
    else {
            
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
        $nivel = 1;
       
        

        $usuario = new \App\Model\Usuario();
        $usuario->setNomeU($nome);
        $usuario->setCpfU($cpf);
        $usuario->setTelefoneU($telefone);
        $usuario->setEmailU($email);
        $usuario->setSenhaU($senha); 
        $usuario->setNivel($nivel); 
        $usuarioDao = new \App\Model\UsuarioDao();
        if ($usuarioDao->create($usuario)){
            $cpf_err = "Email já cadastrado no sistema.";
        } else{
            echo '<script>alert("Usuário cadastrado com sucesso!")</script>';
            $nome = $cpf = $telefone = $email = $senha = "";
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
    <title>Cadastrar Senha</title>
</head>
<body>
  <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label>Nome Completo:</label>
                <input type="text" name="nome" class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>">
                <span class="invalid-feedback"><?php echo $nome_err; ?></span>
            </div>    
            <div class="form-group">
                <label>CPF:</label>
                <input type="text" name="cpf" class='cpf' class="form-control <?php echo (!empty($cpf_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpf; ?>">
                <span class="invalid-feedback"><?php echo $cpf_err; ?></span>
            </div>
            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telefone" class='telefone' class="form-control <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>">
                <span class="invalid-feedback"><?php echo $telefone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $senha; ?>">
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>
            <!-- montando a área de confirmação -->
            <div class="form-group">
                <label>Confirmar Senha:</label>
                <input type="password" name="confirma" class="form-control <?php echo (!empty($confirma_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirma; ?>">
                <span class="invalid-feedback"><?php echo $confirma_err; ?></span>
            </div>
            <p></p>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta" name="gravar">
            </div>
            <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
        </form>
    </div>    



    <script type= "text/javascript" src="../../js/jquery-3.6.4.js"></script>
    <script type= "text/javascript" src="../../js/jquery.mask.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            $('.telefone').mask('(00)00000-0000');
            $('.cpf').mask('000.000.000-00');
       }); 
    </script>
</body>
</html>

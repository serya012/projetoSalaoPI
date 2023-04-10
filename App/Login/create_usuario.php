<?php
$nome = $cpf = $telefone = $email = $senha = $confirma = "";
$nome_err = $cpf_err = $telefone_err = $email_err = $senha_err = $confirma_err = "";


if (isset($_POST["gravar"])){

    require_once '..\Model\conexao.php';
    require_once '..\Model\usuario.php';
    require_once '..\Model\usuarioDao.php';
    
    if(empty(trim($_POST["nome"])) || strlen($_POST["nome"])<8){   
        $nome_err = "O nome precisa ser preenchido com no mínimo 8 caracteres.";
    } elseif(empty(trim($_POST["email"])) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $email_err = "Por favor coloque um email válido para o nome de usuário.";
    } elseif(empty(trim($_POST["telefone"])) || strlen($_POST["telefone"])<11){   
        $telefone_err = "O telefone tem que ser válido.";
    } elseif(empty(trim($_POST["cpf"])) || strlen($_POST["cpf"])<11){   
        $cpf_err = "Insira um CPF válido.";
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
        $usuario->setEmailU($email);
        $usuario->setTelefoneU($telefone);
        $usuario->setCpfU($cpf);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloCadastro.css">
    <title>Cadastro SóDelas</title>
</head>
<body>
    <div>

    </div>
    <div class="box">
        <form action="">
            <fieldset>
                <legend><b>Cadastro de Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                    <span class="invalid-feedback"><?php echo $nome_err; ?></span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" required>
                    <label for="email" class="labelInput">Email</label>
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                    <span class="invalid-feedback"><?php echo $telefone_err; ?></span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser <?php echo (!empty($cpf_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpf; ?>" required>
                    <label for="cpf" class="labelInput">Cpf</label>
                    <span class="invalid-feedback"><?php echo $cpf_err; ?></span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $senha; ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                    <span class="invalid-feedback"><?php echo $senha_err; ?></span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="confirma" id="confirma" class="inputUser <?php echo (!empty($confirma_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirma; ?>" required>
                    <label for="confirma" class="labelInput">Confrimar senha</label>
                    <span class="invalid-feedback"><?php echo $confirma_err; ?></span>
                </div>
                <p>Já tem uma conta? <a href="login_usuario.php">Entre aqui</a>.</p>
                
                <input type="submit" name="submit" id="submit">
            </fieldset>
            
        </form>
    </div>
<div>
    <img src="../../img/" alt="">
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

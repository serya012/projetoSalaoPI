<?php
$nome = $cpf = $data = $telefone = $email = $senha = $confirma = $endereco = $funcao = "";
$nome_err = $cpf_err = $data_err = $telefone_err = $email_err = $senha_err = $confirma_err = $endereco_err = $funcao_err = "";


if (isset($_POST["gravar"])){

    require_once '..\Model\conexao.php';
    require_once '..\Model\funcionario.php';
    require_once '..\Model\funcionarioDao.php';
    
    if(empty(trim($_POST["nome"])) || strlen($_POST["nome"])<8){   
        $nome_err = "O nome precisa ser preenchido com no mínimo 8 caracteres.";
    } elseif(empty(trim($_POST["cpf"])) || strlen($_POST["cpf"])<11){   
        $cpf_err = "Insira um CPF válido.";
    } elseif(empty(trim($_POST["telefone"])) || strlen($_POST["telefone"])<11){   
        $telefone_err = "O telefone tem que ser válido.";
    } elseif(empty(trim($_POST["email"])) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $email_err = "Por favor coloque um email válido para o nome de usuário.";
    } elseif(empty(trim($_POST["endereco"])) || strlen($_POST["endereco"])<15 ){   
        $telefone_err = "Insira um endereço válido ";
    } elseif(empty(trim($_POST["senha"])) || strlen($_POST["senha"])<8){   
        $senha_err = "A senha precisa ser preenchida com no mínimo 8 caracteres.";
    } elseif($_POST['senha'] != $_POST['confirma']) {
        $confirma_err = 'As duas senhas devem ser iguais!';
    } elseif(empty(trim($_POST["funcao"])) || strlen($_POST["funcao"])<3){   
        $telefone_err = "Escreva a função.";
    }
    
    else {
            
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
                <input type="text" name="cpf" class="form-control <?php echo (!empty($cpf_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpf; ?>">
                <span class="invalid-feedback"><?php echo $cpf_err; ?></span>
            </div>
            <div class="form-group">
                <label>Data de Nascimento:</label>
                <input type="date" name="data" class="form-control <?php echo (!empty($data_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data; ?>">
                <span class="invalid-feedback"><?php echo $data_err; ?></span>
            </div>
            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telefone" class="form-control <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>">
                <span class="invalid-feedback"><?php echo $telefone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Endereço:</label>
                <input type="text" name="endereco" class="form-control <?php echo (!empty($endereco_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $endereco; ?>">
                <span class="invalid-feedback"><?php echo $endereco_err; ?></span>
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
            <div class="form-group">
                <label>Função:</label>
                <input type="text" name="funcao" class="form-control <?php echo (!empty($funcao_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $funcao; ?>">
                <span class="invalid-feedback"><?php echo $funcao_err; ?></span>
            </div>
            <p></p>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta" name="gravar">
            </div>
        </form>
    </div>    
</body>
</html>

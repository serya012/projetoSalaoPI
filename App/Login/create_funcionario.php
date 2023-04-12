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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cadastrar Senha</title>
</head>
<body>
  <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label>Nome Completo:</label>
                <input type="text" name="nome" class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>" required>
                <span class="invalid-feedback"><?php echo $nome_err; ?></span>
            </div>    
            <div class="form-group">
                <label>CPF:</label><br>
                <input type="text" name="cpf" class="cpf" class="form-control <?php echo (!empty($cpf_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpf; ?>" required>
                <span class="invalid-feedback"><?php echo $cpf_err; ?></span>
            </div>
            <div class="form-group">
                <label>Data de Nascimento:</label><br>
                <input type="date" name="data" class="data" class="form-control <?php echo (!empty($data_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data; ?>" required>
                <span class="invalid-feedback"><?php echo $data_err; ?></span>
            </div>
            <div class="form-group">
                <label>Telefone:</label><br>
                <input type="text" name="telefone" class="telefone" class="form-control <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>" required>
                <span class="invalid-feedback"><?php echo $telefone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Endereço:</label>
                <input type="text" name="endereco" class="form-control <?php echo (!empty($endereco_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $endereco; ?>" required>
                <span class="invalid-feedback"><?php echo $endereco_err; ?></span>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $senha; ?>" required>
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>
            <!-- montando a área de confirmação -->
            <div class="form-group">
                <label>Confirmar Senha:</label>
                <input type="password" name="confirma" class="form-control <?php echo (!empty($confirma_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirma; ?>" required>
                <span class="invalid-feedback"><?php echo $confirma_err; ?></span>
            </div>
            <div class="form-group">
                <label>Função:</label>
                <input type="text" name="funcao" class="form-control <?php echo (!empty($funcao_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $funcao; ?>" required>
                <span class="invalid-feedback"><?php echo $funcao_err; ?></span>
            </div>
            <p></p>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta" name="gravar">
            </div>
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

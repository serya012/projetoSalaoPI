<?php
if(count($_POST) > 0) {
    require_once '..\Model\conexao.php';
    require_once '..\Model\usuario.php';
    require_once '..\Model\usuarioDao.php';
    
    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confsenha = $_POST['confsenha'];

    if(empty($nome) && strlen($nome)<2) {
        $erro = "Preencha o nome da usuario";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Insira um email válido";
    } else if(empty($cpf) && strlen($cpf)==11) {
        $erro = "Insira um CPF válido";
    } else if(empty($telefone) && strlen($telefone)==11) {
        $erro = "Insira uma telefone válido";
    } else if(empty(trim($senha)) || strlen($senha)<=8) { 
        $erro = "Insira uma senha válida com no mínimo 8 caracteres";
    } else if($senha != $confsenha) {
        $erro = "As senhas não são iguais";
    } 
    
    /*else {
        //$usuarios = $cpf;
       

      

        $usuarioDao = new \App\Model\usuarioDao();
        if($usuarioDao->create($usuario)){
            echo "CPF já cadastrado";
        } else{
            echo '<script>alert("usuario cadastrada com sucesso!")</script>';
        }
        
    }*/

    if($erro) {
        echo '<script>alert("'.$erro.'")</script>';
    } else {
        $versenha = password_hash($senha,PASSWORD_DEFAULT);

        $usuario = new \App\Model\usuario();
        $usuario->setNomeU($nome);
        $usuario->setEmailU($email);
        $usuario->setTelefoneU($telefone);
        $usuario->setCpfU($cpf);
        $usuario->setSenhaU($versenha);
        
        $usuarioDao = new \App\Model\usuarioDao();
        $usuarioDao->create($usuario);
        unset($_POST);
        echo '<script>alert("usuario salva com sucesso!!")</script>';
       
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">    
    
    <title>Cadastrar-se</title>
</head>
<body>
    <div class="container">
        <div class="display-3">Cadastro</div>
        <form method="POST" action="">
        <p class="lead">
            <label>Nome de usuário:</label>
            <input name="nome" type="text"   size="50">
        </p>
        <p class="lead">
            <label>Email:</label>
            <input name="email" type="text" placeholder="exemplo@gmail.com"  size="51">
        </p>
        <p class="lead">
            <label>Telefone:</label>
            <input name="telefone" type="text" size="48"  >
        </p>
        <p class="lead">
            <label>CPF:</label>
            <input name="cpf" type="text" size="22">
        </p>
        <p class="lead">
            <label>Senha:</label>
            <input name="senha" type="password" size="50">
        </p>
        <p class="lead">
            <label>Confirmar Senha:</label>
            <input name="confsenha" type="password" size="39">
        </p>
        
        <p>
            <button type="submit" class="btn btn-light" title="Cadastro">Cadastrar-se</button>
            

        </p>
        </form>
    </div>
</body>
</html>
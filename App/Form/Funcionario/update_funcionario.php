<?php

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\funcionario.php';
    require_once '..\..\Model\funcionarioDao.php';

    $id = intval($_GET['id_funcionario']);
    $funcionario = new \App\Model\funcionario();
    $funcionarioDao = new \App\Model\funcionarioDao();
   
 
    if(count($_POST) > 0) {

        $erro = false;
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $funcao = $_POST['funcao'];
        
    
        if(empty(trim($_POST["telefone"])) || strlen($_POST["telefone"])<11) {
            $erro = "O telefone tem que ser válido.";
        } else if(empty(trim($_POST["email"])) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
            $erro = "Por favor coloque um email válido para o nome de usuário.";
        } else if(empty(trim($_POST["endereco"])) || strlen($_POST["endereco"])<3) {
            $erro = "Insira um endereço válido";
        } else if(empty(trim($_POST["funcao"])) || strlen($_POST["funcao"])<3) {
            $erro = "Escreva a função";
        }

        if($erro) {
            echo "<p><b>ERRO: $erro</b></p>";
        } else {

            $funcionario->setIdF($id);
            $funcionario->setTelefoneF($telefone);
            $funcionario->setEmailF($email);
            $funcionario->setEndereco($endereco);
            $funcionario->setFuncao($funcao);
            
            $funcionarioDao->update($funcionario);

            echo "<p><b>Funcionário atualizado com sucesso!!!</b></p>";
            unset($_POST);
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
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <title>Editar Funcionário</title>
</head>
<body>
    
    <div class="container">
    
    <form method="POST" action="">
    <?php
       foreach ($funcionarioDao->readUpdate($id) as $funcionario): ?>
            <div class="form-group">
                <label>Nome Completo:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>CPF:</label><br>
                <input type="text" name="cpf" class="cpf" class="form-control " required>
            </div>
            <div class="form-group">
                <label>Telefone:</label><br>
                <input type="text" name="telefone" class="telefone" class="form-control">
                
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Endereço:</label>
                <input type="text" name="endereco" class="form-control">

            <div class="form-group">
                <label>Função:</label>
                <input type="text" name="funcao" class="form-control">
            </div>
    <?php
        endforeach;
    ?>
        <button type="submit" class="btn btn-light" title="Gravar atualização">Salvar Alterações</button>
        <a href="read_funcionario.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>
        </p>
        
       
    </form>
    </div>

    <script type= "text/javascript" src="../../js/jquery-3.6.4.js"></script>
    <script type= "text/javascript" src="../../js/jquery.mask.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            $('.telefone').mask('(00)00000-0000');
       }); 
    </script>
</body>
</html>
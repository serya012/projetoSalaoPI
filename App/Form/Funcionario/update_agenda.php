<?php

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\agenda.php';
    require_once '..\..\Model\agendaDao.php';

    $id = intval($_GET['id_agenda']);
    $agenda = new \App\Model\Agenda();
    $agendaDao = new \App\Model\AgendaDao();
   
 
    if(count($_POST) > 0) {

        $erro = false;
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $funcao = $_POST['funcao'];
        
    
        $agenda->setIdF($id);
        $agenda->setTelefoneF($telefone);
        $agenda->setEmailF($email);
        $agenda->setEndereco($endereco);
        $agenda->setFuncao($funcao);
        
        $agendaDao->update($agenda);

        echo "<p><b>Funcionário atualizado com sucesso!!!</b></p>";
        unset($_POST);
        
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../../css/estiloMenu.css">
    <title>Editar Funcionário</title>
</head>
<body>
    
    <div class="container">
    
    <form method="POST" action="">
    <?php
       foreach ($agendaDao->readUpdate($id) as $agenda): ?>
        <p class="lead">
            <label>Serviços:</label>
            <select name="servico">
                <option value=""></option>
            </select>
        </p>
        <p class="lead">
            <label>Data:</label>
            <input type="date" name="data">
        </p>
        <p class="lead">
            <label>Hora:</label>
            <select name="hora">
                <option value=""></option>
            </select>
        </p>
        
        
        
            <button type="submit" class="btn btn-light" title="Gravar">Salvar Serviço</button>
            <a href="read_servico.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>

        </p>
        </form>
    <?php
        endforeach;
    ?>
        <button type="submit" class="btn btn-light" title="Gravar atualização">Salvar Alterações</button>
        <a href="read_agenda.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>
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
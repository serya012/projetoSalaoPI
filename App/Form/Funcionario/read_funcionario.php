<?php
   
    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\funcionario.php';
    require_once '..\..\Model\funcionarioDao.php';

    $funcionario = new \App\Model\funcionario();
    $funcionarioDao = new \App\Model\funcionarioDao();
    try {
        $funcionarioDao->read();
    } catch(\PDOException $e){
        echo 'Erro: no read_funcionario.php - verificar tabela '.$e->getMessage();
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
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <title>Consultar Funcionários</title>
</head>
<body>
 <div class="container">
    <div class="row h6 bg-secondary">
        <div class="col-3">Nome</div>
        <div class="col-2">Telefone</div>
        <div class="col-3">Endereço</div>
        <div class="col-2">Função</div>
        <div class="col">Ações</div>
    </div>
    <?php
        foreach ($funcionarioDao->read() as $funcionario):
            echo ('<div class="row">
                    <div class="col-3">'.$funcionario["nome_funcionario"].'</div>
                    <div class="col-2">'.$funcionario["telefone_funcionario"].'</div>
                    <div class="col-3">'.$funcionario["endereco"].'</div>
                    <div class="col-2">'.$funcionario["funcao"].'</div>
                    <div class="col">
                        <a href="update_funcionario.php?id_funcionario='.$funcionario["id_funcionario"].'"><button type="button" class="btn btn-light" title="Editar Funcionario">Editar</button></a>
                        <a href="delete_funcionario.php?id_funcionario='.$funcionario["id_funcionario"].'"><button type="button" class="btn btn-light" title="Excluir Funcionario">Excluir</button></a>
                    </div>
                   </div>'
                );          
        endforeach;
    ?>
 </div>                
</body>
</html>
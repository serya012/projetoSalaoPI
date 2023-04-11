<?php

require_once '..\Model\conexao.php';
require_once '..\Model\agenda.php';
require_once '..\Model\agendaDao.php';


if(count($_POST) > 0) {
    
    $erro = false;
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    
   
    
    if($_POST['tipo']!='cabelos' && $_POST['tipo']!='maquiagem' && $_POST['tipo']!='estetica' && $_POST['tipo']!='cilios e sobrancelhas' && $_POST['tipo']!='pes e maos' && $_POST['tipo']!='depilacao') {
        $erro = "Insira um tipo de serviço válido";
    } else if(empty($serv)) {
        $erro = "Preencha o nome do serviço";
    } else if(empty($descricao)) {
        $erro = "Preencha a descrição do serviço";
    } else if(empty($valor) || $valor<0) {
        $erro = "Preencha a descrição do serviço";
    }

    if($erro) {
        echo '<script>alert("'.$erro.'")</script>';
    } else {
        $servico = new \App\Model\Servico();
        $servico->setTipo($tipo);
        $servico->setServico($serv);
        $servico->setDescricao($descricao);
        $servico->setValor($valor);
        $servicoDao = new \App\Model\ServicoDao();
        $servicoDao->create($servico);
        unset($_POST);
        echo '<script>alert("servico salvo com sucesso!!")</script>';
       
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
    
    <title>Agendar</title>
</head>
<body>
    <div class="container">
        <div class="display-3">Agendamento</div>
        
        <form method="POST" action="">
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
    </div>
</body>
</html>
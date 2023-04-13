<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <title>Excluir Serviço</title>
</head>
<body>

    <div class="container">
    <div class="display-3">Tem certeza que deseja excluir este serviço?</div>
    
    <form action="" method="post">
        <a href="read_servico.php"><button type="button" class="btn btn-secondary" title="Não Excluir">Não</button></a>
        <button type="submit" class="btn btn-danger"  title="Excluir Serviço" name="confirmar">Sim</button>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['confirmar'])) {

    require_once '..\Model\conexao.php';
    require_once '..\Model\servico.php';
    require_once '..\Model\servicoDao.php';

    $id = intval($_GET['id_servico']);
    $servico = new \App\Model\Servico();
    $servicoDao = new \App\Model\ServicoDao();
    $servicoDao->delete($id);
    header('Location: read_servico.php');
    }
?>
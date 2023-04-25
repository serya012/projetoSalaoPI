<?php

require_once '..\..\Model\conexao.php';
require_once '..\..\Model\servico.php';
require_once '..\..\Model\servicoDao.php';
require_once '..\..\Model\funcionarioDao.php';

if(count($_POST) > 0) {
    
    $erro = false;
    $tipo = $_POST['tipo'];
    $serv = $_POST['servico'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $funcionario = $_POST['funcionario'];

   
    if($erro) {
        echo '<script>alert("'.$erro.'")</script>';
    } else {
        $servico = new \App\Model\Servico();
        $servico->setTipo($tipo);
        $servico->setServico($serv);
        $servico->setDescricao($descricao);
        $servico->setValor($valor);
        $servico->setIdFk($funcionario);
        $servicoDao = new \App\Model\ServicoDao();
        $servicoDao->create($servico);
        unset($_POST);
        echo '<script>alert("Serviço salvo com sucesso!!")</script>';
       
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
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <title>Cadastrar Produto</title>
</head>
<body>
<header class="header">
    <div class="logo-header">
   
    </div>
  
    <div class="lista">
      <ul>
        <li><a href="#img-inicio">Inicio</a></li>
        <li><a href="#sobre-nos">Sobre Nós</a></li>
        <li><a href="#section3">Parceiros</a></li>
        <li><a href="#section3">Equipe</a></li>
        <li><a href="#section3">Serviços</a></li>
        <li><a href="#contatos-relogio-loc">Contato</a></li>
      </ul>
    </div>
  
    <!--
  
      codigo ryan
  
    <div class="btn-group">
      <a href="index.html">  <button class="btn btn1">Inicio</button></a>
      <a href="#sobre-nos"> <button class="btn btn2">Sobre nós</button></a>
    <a href="#fundo-rosa"><button class="btn btn3">Parceiros</button></a>
    <button class="btn btn4">Equipe</button>
    <button class="btn btn5">Serviços</button>
    <a href="#contatos-relogio-loc"><button class="btn btn6">Contatos</button></a>
    
  </div>
  -->
  <div class="ico-user-header">
    <img src="../../img/iconeLogin1.png" alt="ico-user" class="ico-img">
    
  <div> <button class="btn-login">Login</button></div>
</div>
  
  
    
   
  </header>
<div class="container1">
    <div class="container">
        <div class="display-3">Cadastro de Serviços</div>
        
        <form method="POST" action="">
        <p class="lead">
            <label >Tipo de Serviço:</label><br>
            <select name="tipo" class="form-control">
                <option value='cabelos'>Cabelos</option>
                <option value='maquiagem'>Maquiagem</option>
                <option value='estetica'>Estética</option>
                <option value='cilios e sobrancelhas'>Cílios e Sobrancelhas</option>
                <option value='pes e maos'>Pés e Mãos</option>
                <option value='depilacao'>Depilação</option>
            </select>
        </p>
        <p class="lead">
            <label>Serviço:</label><br>
            <input name="servico" type="text" size="40">
        </p>
        <p class="lead">
            <label>Descrição:</label><br>
            <textarea name="descricao" rows="3" cols="40"></textarea>
        </p>
        <p class="lead">
            <label>Valor:</label><br>
            <input name="valor" type="number" size="20">
        </p>
        <p class="lead">
        <option value="">Selecione...</option>
        <?php 
                $pdo = new PDO('mysql:host=localhost;dbname=salao', 'root', '');

                $query = "SELECT id_funcionario, nome_funcionario FROM funcionario";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <select name="funcionario" id="opcao">
            <?php foreach ($result as $row): ?>
        <option value="<?php echo $row['id_funcionario']; ?>"><?php echo $row['nome_funcionario']; ?></option>
            <?php endforeach; ?>
        </select>
        </p>
        
        
            <button type="submit" class="btn btn-light" title="Gravar">Salvar Serviço</button>
            <a href="read_servico.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>

        </p>
        </form>
    </div>
    </div>
</body>
</html>
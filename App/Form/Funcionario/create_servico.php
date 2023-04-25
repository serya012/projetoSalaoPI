<?php
 if (!isset($_SESSION)) session_start();
 if (!isset($_SESSION['id_funcionario']))
   die('Você não está logado. <a href="../../Login/login_funcionario.php">Clique aqui</a> para logar');
 if ($_SESSION['nivel'] != '2')
  die('Você não tem permissão. <a href="javascript:history.back()">Clique aqui</a> para voltar');
  
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
<header>
    <nav>
      <img class="logo" src="../../../img/logo.png" alt="logo">
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>

      <ul class="nav-list">
        <li><a class="a1" href="indexlogado.php">Início</a></li>
        <li><a class="a1" href="indexlogado.php">Sobre nós</a></li>
        <li><a class="a1" href="../../../paginas/servicos_logado.html">Serviços</a></li>
        <li><a class="a1" href="indexlogado.php">Parceiros</a></li>
        <li><a class="a1" href="../../../paginas/equipe_logado.html">Equipe</a></li>
        <li><a class="a1" href="indexlogado.php">Contato</a></li>
      </ul>

      <div class="ico-login">
        <a href="../../Login/logout_funcionario.php"><img src="../../../img/iconeLogin1.png" alt=""></a>
        <div class="btn-login">
          <button><a href="../../Login/login_funcionario.php">Logout</a></button>
        </div>
      </div>
    </nav>
  </header>    

  <br><br><br>
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
        <p><?php echo "Serviço salvo com sucesso!!";
       
            }
        } ?>
        </p>
        </p>
            <button type="submit" class="btn btn-light" title="Gravar">Salvar Serviço</button>
            <a href="read_servico.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>

        </p>
        </form>
    </div>
    </div>
</body>
</html>
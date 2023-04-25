<?php

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\servico.php';
    require_once '..\..\Model\servicoDao.php';

    $id = intval($_GET['id_servico']);
    $servico = new \App\Model\Servico();
    $servicoDao = new \App\Model\ServicoDao();
   
 
    if(count($_POST) > 0) {

        $tipo = $_POST['tipo'];
        $serv = $_POST['servico'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $funcionario = $_POST['funcionario'];
      
        $servico->setIdS($id);
        $servico->setTipo($tipo);
        $servico->setServico($serv);
        $servico->setDescricao($descricao);
        $servico->setValor($valor);
        $servico->setIdFk($funcionario);
            
        $servicoDao->update($servico);

            echo "<p><b>Serviço atualizado com sucesso!!!</b></p>";
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
    <link rel="stylesheet" href="../../../css/estiloMenu.css">
    <title>Editar Serviço</title>
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
  <br><br>
    <div class="container">
        <div class="display-3">Atualizar Serviço</div>

        <form method="POST" action="">
        <?php foreach ($servicoDao->readUpdate($id) as $servico); ?>
            <p class="lead">
                <label>Tipo de Serviço</label><br>
                <select name="tipo" class="form-control">
                    <option value="<?php echo $servico['tipo_de_servico'] ?>"><?php echo $servico['tipo_de_servico'] ?></option>
                    <option value="cabelos">Cabelos</option>
                    <option value="maquiagem">Maquiagem</option>
                    <option value="estetica">Estética</option>
                    <option value="cilios e sobrancelhas">Cílios e Sobrancelhas</option>
                    <option value="pes e maos">Pés e Mãos</option>
                    <option value="depilacao">Depilação</option>
                </select>
            </p>
            <p class="lead">
                <label>Serviço</label>
                <input value="<?php echo $servico['servico'] ?>" name="servico" type="text" size="40">
            </p>
            <p class="lead">
                <label>Descrição</label>
                <textarea name="descricao" rows="3" cols="40"></textarea>
            </p>
            <p class="lead">
                <label>Valor</label>
                <input value="<?php echo $servico['valor'] ?>" name="valor" type="text" size="20">
            </p>
            <p class="lead">
                <?php 
                    $pdo = new PDO('mysql:host=localhost;dbname=salao', 'root', '');

                    $query = "SELECT id_funcionario, nome_funcionario FROM funcionario";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                ?>

                <select name="funcionario" class="form-control">
                    <option value="">Selecione...</option>
                        <?php foreach ($result as $row): ?>
                    <option value="<?php echo $row['id_funcionario']; ?>"><?php echo $row['nome_funcionario']; ?></option>
                        <?php endforeach; ?>
                </select>  
            </p>
            <p>
            <button type="submit" class="btn btn-light" title="Gravar">Salvar Serviço</button>
            <a href="read_servico.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>
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
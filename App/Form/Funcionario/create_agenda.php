<?php
    session_start();
    if (isset($_SESSION['id_usuario']))
    

require_once '..\..\Model\conexao.php';
require_once '..\..\Model\agenda.php';
require_once '..\..\Model\agendaDao.php';


if(count($_POST) > 0) {
    
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $usuario = $_POST['usuario'];
    
        $agenda = new \App\Model\Agenda();
        $agenda->setServicoFk($servico);
        $agenda->setDataA($data);
        $agenda->setHora($hora);
        $agenda->setUsuarioFk($usuario);

        $agendaDao = new \App\Model\AgendaDao();
        $agendaDao->create($agenda);
        unset($_POST);
        echo '<script>alert("Agenda salva com sucesso!!")</script>';
       
    
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
    <title>Agendar</title>
</head>
<body>
<header>
    <nav>
      <img class="logo" src="../../../img/logo.png" alt="logo" >
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
        <li><a class="a1" href="../../Login/logout_usuario.php">Sair</a></li>
      </ul>
    </nav>
  </header>
  
    <div class="container1">
    <div class="container">
        <div class="display-3">Agendamento</div>
        
        <form method="POST" action="">
        <p class="lead">
        <label>Serviços:</label>
            <select name="servico" id="opcao">
                <option value="">Selecione...</option>
            <?php //Pra montar os options que interagem com o banco
                $pdo = new PDO('mysql:host=localhost;dbname=salao', 'root', '');

                $query = "SELECT id_servico, servico FROM servico";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
            <?php foreach ($result as $row): ?>
                 <option value="<?php echo $row['id_servico']; ?>"><?php echo $row['servico']; ?></option>
            <?php endforeach; ?>
            </select>
        </p>
        <p class="lead">
            <label>Data:</label>
            <input type="date" name="data">
        </p>
        <p class="lead">
            <label>Hora:</label>
            <select name="hora">
            <optgroup label="Manhã">
                <option value="09:00:00">9:00</option>
                <option value="10:00:00">10:00</option>
                <option value="11:00:00">11:00</option>
                <optgroup label="Tarde">
                <option value="13:00:00">13:00</option>
                <option value="14:00:00">14:00</option>
                <option value="15:00:00">15:00</option>
                <option value="16:00:00">16:00</option>
                <option value="17:00:00">17:00</option>
                <option value="18:00:00">18:00</option>
                <option value="19:00:00">19:00</option>
            </select>
        </p>
        <p class="lead">
            <label>Cliente:</label>
                
                <?php   
                $user = "SELECT id_usuario, nome_usuario FROM usuario";
                $stmt = $pdo->prepare($user);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                ?>

            <select name="usuario">
                <option value="">Selecione...</option>
                    <?php foreach ($resultado as $row): ?>
                 <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nome_usuario']; ?></option>
                    <?php endforeach; ?>
            </select>

        </p>
        
        
        
            <button type="submit" class="btn btn-light" title="Gravar">Salvar Serviço</button>
            <a href="read_agenda.php"><button type="button" class="btn btn-light" title="Produtos">Voltar</button></a>

        </p>
        </form>
    </div>
    </div>
</body>
</html>
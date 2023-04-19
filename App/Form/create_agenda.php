<?php
    session_start();
    if (isset($_SESSION['id_usuario']))
    $nome = $_SESSION['id_usuario'];

require_once '..\Model\conexao.php';
require_once '..\Model\agenda.php';
require_once '..\Model\agendaDao.php';


if(count($_POST) > 0) {
    
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $usuario = $nome;
    
    echo $usuario;
    
        $agenda = new \App\Model\Agenda();
        $agenda->setServicoFk($servico);
        $agenda->setDataA($data);
        $agenda->setHora($hora);
        $agenda->setUsuarioFk($usuario);

        $agendaDao = new \App\Model\AgendaDao();
        $agendaDao->create($agenda);
        unset($_POST);
        echo '<script>alert("agenda salvo com sucesso!!")</script>';
       
    
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
    <link rel="stylesheet" href="../../css/estiloMenu.css">
    <title>Agendar</title>
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
        <li><a>Equipe</a></li>
        <li><a>Serviços</a></li>
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
                <option value="9h">9:00</option>
                <option value="10h">10:00</option>
                <option value="11h">11:00</option>
                <optgroup label="Tarde">
                <option value="13h">13:00</option>
                <option value="14h">14:00</option>
                <option value="15h">15:00</option>
                <option value="16h">16:00</option>
                <option value="17h">17:00</option>
                <option value="18h">18:00</option>
                <option value="19h">19:00</option>
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
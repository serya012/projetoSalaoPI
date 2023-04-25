<?php

    require_once '..\..\Model\conexao.php';
    require_once '..\..\Model\agenda.php';
    require_once '..\..\Model\agendaDao.php';

    $id = intval($_GET['cod_agenda']);
    $agenda = new \App\Model\Agenda();
    $agendaDao = new \App\Model\AgendaDao();
   
 
    if(count($_POST) > 0) {

        $servico = $_POST['servico'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        
        
    
        $agenda->setCod($id);
        $agenda->setServicoFk($servico);
        $agenda->setDataA($data);
        $agenda->setHora($hora);
       
        
        $agendaDao->update($agenda);

        echo "<p><b>Agenda atualizado com sucesso!!!</b></p>";
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
    <title>Editar Funcionário</title>
</head>
<body>
    
    <div class="container">
    
    <form method="POST" action="">
    <?php
       foreach ($agendaDao->readUpdate($id) as $agenda): ?>
        <p class="lead">
                    <?php //Pra montar os options que interagem com o banco
                    $pdo = new PDO('mysql:host=localhost;dbname=salao', 'root', '');

                    $query = "SELECT id_servico, servico FROM servico";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
            <label>Serviços:</label>
            <select name="servico">
                <option value=""><?php echo $agenda['id_servico']?></option>
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
                <option value="<?php echo $agenda['hora_agenda']?>"><?php echo $agenda['hora_agenda']?></option>
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
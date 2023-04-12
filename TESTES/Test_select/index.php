<?php 
    // Criar conexão com o banco de dados usando PDO
    $pdo = new PDO('mysql:host=localhost;dbname=salao', 'root', '');



     // Consulta SQL para buscar dados da tabela
     $query = "SELECT id_funcionario, nome_funcionario FROM funcionario";
     $stmt = $pdo->prepare($query);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

   


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select name="opcao" id="opcao">
    <?php foreach ($result as $row): ?>
        <option value="<?php echo $row['id_funcionario']; ?>"><?php echo $row['nome_funcionario']; ?></option>
    <?php endforeach; ?>
</select>
</body>
</html>
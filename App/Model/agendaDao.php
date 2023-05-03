<?php


namespace App\Model;


# Dentro da classe a seguir, temos o nosso CRUD
# Create, Read, Update e Delete


class AgendaDao {


   # função para criar um registro de produto
   public function create(Agenda $a){
       // não estamos inserindo o campo id abaixo, porque o mesmo é auto-incremento
       $sql = 'INSERT INTO agenda (hora_agenda, data_agenda, id_usuario, id_servico) VALUES (?,?,?,?)';
      
       $stmt = Conexao::getConn()->prepare($sql); //prepare é um método da classe PDO
       $stmt->bindValue(1, $a->getHora());
       $stmt->bindValue(2, $a->getDataA());
       $stmt->bindValue(3, $a->getUsuarioFk());
       $stmt->bindValue(4, $a->getServicoFk());

       $stmt->execute();
   }


   # função para ler os registros
   public function read(){
   
        $sql = 'SELECT agenda.*, usuario.nome_usuario, servico.servico FROM agenda INNER JOIN usuario ON agenda.id_usuario = usuario.id_usuario INNER JOIN servico ON agenda.id_servico = servico.id_servico';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        // verificar se a consulta retornou resulatdo
        if($stmt->rowCount() > 0): 
        // Se existe pelo menos uma linha (registro)
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            // insere em resultado o conteúdo
            return $resultado; 
            // retorna a variavel resultado
        else:
            return []; 
            // retorna um array vazio caso não encontre
        endif;
   }

   public function readU($id){
   
    $sql = 'SELECT agenda.*, usuario.nome_usuario, servico.servico FROM agenda INNER JOIN usuario ON agenda.id_usuario = usuario.id_usuario INNER JOIN servico ON agenda.id_servico = servico.id_servico WHERE usuario.id_usuario = :id';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

   # função para atualizar (alterar)
   public function update(Agenda $a){

     $sql = 'UPDATE agenda SET hora_agenda = ?, data_agenda = ?, id_usuario = ?, id_servico = ? WHERE cod_agenda = ?';

     $stmt = Conexao::getConn()->prepare($sql);
     $stmt->bindValue(1,$a->getHora());
     $stmt->bindValue(2,$a->getDataA());
     $stmt->bindValue(3,$a->getUsuarioFk());
     $stmt->bindValue(4,$a->getServicoFk());
     $stmt->bindValue(5,$a->getCod());
     

     $stmt->execute();

   }

    # função para ler os registros
    public function readUpdate($a){
        $sql = 'SELECT * FROM agenda WHERE cod_agenda = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$a);
        $stmt->execute();
    
        // verificar se a consulta retornou resulatdo
        if($stmt->rowCount() > 0): 
        // Se existe pelo menos uma linha (registro)
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            // insere em resultado o conteúdo
            return $resultado; 
            // retorna a variavel resultado
        else:
            return []; 
            // retorna um array vazio caso não encontre
        endif;    
    }

   # função para apagar registro
   public function delete($id){

        $sql = 'DELETE FROM agenda WHERE cod_agenda = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
   }
   

    public function obterDados() {
       $conn = Conexao::getConn(); // Obtém a instância da conexão PDO
 
       try {
          $sql = "SELECT * FROM funcionario"; // Substitua "tabela" pelo nome da sua tabela
          $stmt = $conn->query($sql);
          $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
          return $result;
       } catch(\PDOException $e) {
          echo "Erro ao obter dados da tabela: " . $e->getMessage();
          return null;
       }
    }
 
    public function readfk()
    {
        $sql = "SELECT usuario.cod_agenda, a.id_usuario, a.id_servico, a.hora_agenda, a.data_agenda, u.nome FROM agenda a JOIN usuario u ON a.id_usuario = u.id_usuario";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}


?>
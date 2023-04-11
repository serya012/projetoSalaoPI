<?php


namespace App\Model;


# Dentro da classe a seguir, temos o nosso CRUD
# Create, Read, Update e Delete


class AgendaDao {


   # função para criar um registro de produto
   public function create(Agenda $a){
       // não estamos inserindo o campo id abaixo, porque o mesmo é auto-incremento
       $sql = 'INSERT INTO agenda (hora_agenda, data_agenda) VALUES (?,?)';
      
       $stmt = Conexao::getConn()->prepare($sql); //prepare é um método da classe PDO
       $stmt->bindValue(1, $a->getHora());
       $stmt->bindValue(2, $a->getDataA());
       

       $stmt->execute();
   }


   # função para ler os registros
   public function read(){
   
        $sql = 'SELECT * FROM agenda';
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


   # função para atualizar (alterar)
   public function update(Agenda $a){

     $sql = 'UPDATE agenda SET hora_agenda = ?, data_agenda WHERE cod_agenda = ?';

     $stmt = Conexao::getConn()->prepare($sql);
     $stmt->bindValue(1,$a->getHora());
     $stmt->bindValue(2,$a->getDataA());
     

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
 
 

}


?>
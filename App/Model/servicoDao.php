<?php


namespace App\Model;


# Dentro da classe a seguir, temos o nosso CRUD
# Create, Read, Update e Delete


class ServicoDao {


   # função para criar um registro de produto
   public function create(Servico $s){
       // não estamos inserindo o campo id abaixo, porque o mesmo é auto-incremento
       $sql = 'INSERT INTO servico (tipo_de_servico, servico, descricao, valor, id_funcionario) VALUES (?,?,?,?,?)';
      
       $stmt = Conexao::getConn()->prepare($sql); //prepare é um método da classe PDO
       $stmt->bindValue(1, $s->getTipo());
       $stmt->bindValue(2, $s->getServico());
       $stmt->bindValue(3, $s->getDescricao());
       $stmt->bindValue(4, $s->getValor());
       $stmt->bindValue(5, $s->getIdFk());
       

       $stmt->execute();
   }


   # função para ler os registros
   public function read(){
   
        $sql = 'SELECT * FROM servico';
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
   public function update(Servico $s){

     $sql = 'UPDATE servico SET tipo_de_servico = ?, descricao = ?, servico = ?, valor = ?, id_funcionario = ? WHERE id_servico = ?';

     $stmt = Conexao::getConn()->prepare($sql);
     $stmt->bindValue(1,$s->getTipo());
     $stmt->bindValue(2,$s->getDescricao());
     $stmt->bindValue(3,$s->getServico());
     $stmt->bindValue(4,$s->getValor());
     $stmt->bindValue(5,$s->getIdFk());
     $stmt->bindValue(6,$s->getIdS());

     $stmt->execute();

   }

    # função para ler os registros
    public function readUpdate($s){
        $sql = 'SELECT * FROM servico WHERE id_servico = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$s);
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

        $sql = 'DELETE FROM servico WHERE id_servico = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
   }
}

?>
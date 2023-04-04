<?php

namespace App\Model;

class Usuario{
  
   private $id_servico, $tipo_de_servico, $descricao, $servico, $valor;
 
   public function getIdU(){
        return $this->id_servico;
   }

   public function setIdU($idS){
    $this->id_servico = $idS;
   }

   public function getTipo(){
    return $this->tipo_de_servico;
     }
  
     public function setTipo($tipo){
    $this->tipo_de_servico = $tipo;
     }

     public function getDescricao(){
      return $this->descricao;
       }
    
       public function setDescricao($desc){
      $this->descricao = $desc;
       }

       public function getServico(){
        return $this->servico;
         }
      
         public function setServico($serv){
        $this->servico = $serv;
         }

         public function getValor(){
          return $this->valor;
           }
        
           public function setValor($val){
          $this->valor = $val;
           }
}


?>
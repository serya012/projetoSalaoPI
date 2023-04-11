<?php

namespace App\Model;

class Servico{
  
   private $id_servico, $tipo_de_servico, $descricao, $servico, $valor;
 
   public function getIdS(){
        return $this->id_servico;
   }

   public function setIdS($idS){
    $this->id_servico = $idS;
   }

   public function getTipo(){
    return $this->tipo_de_servico;
     }
  
     public function setTipo($t){
    $this->tipo_de_servico = $t;
     }

     public function getDescricao(){
     return $this->descricao;
     }
    
     public function setDescricao($d){
     $this->descricao = $d;
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
        
     public function setValor($v){
     $this->valor = $v;
     }
}


?>
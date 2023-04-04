<?php

namespace App\Model;

class Usuario{
  
   private $id_usuario, $nome_usuario, $cpf_usuario, $telefone_usuario, $email_usuario, $senha_usuario,$nivel;
 
   public function getIdU(){
        return $this->id_usuario;
   }

   public function setIdU($idU){
    $this->id_usuario = $idU;
   }

   public function getNomeU(){
       return $this->nome_usuario;
   }

   public function setNomeU($nU){
       $this->nome_usuario = $nU;
   }

   public function getCpfU(){
       return $this->cpf_usuario;
   }

   public function setCpfU($cU){
       $this->cpf_usuario = $cU;
   }

   public function getTelefoneU(){
       return $this->telefone_usuario;
   }

   public function setTelefoneU($tU){
       $this->telefone_usuario = $tU;
   }

   public function getEmailU(){
    return $this->email_usuario;
    }

    public function setEmailU($eU){
    $this->email_usuario = $eU;
    }

    public function getSenhaU(){
    return $this->senha_usuario;
    }
    
    public function setSenhaU($sU){
    $this->senha_usuario = $sU;
    }

    public function getNivel(){
    return $this->nivel;
    }
        
    public function setNivel($ni){
    $this->nivel = $ni;
    }
}


?>

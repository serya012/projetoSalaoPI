<?php

namespace App\Model;

class Funcionario{
  
   private $id_funcionario, $nome_funcionario, $telefone_funcionario, $funcao ,$cpf_funcionario, $data_nascimento_funcionario, $email_funcionario, $senha_funcionario, $endereco ,$nivel;
 
   public function getIdF(){
        return $this->id_funcionario;
   }

   public function setIdF($idF){
    $this->id_funcionario = $idF;
   }

   public function getNomeF(){
       return $this->nome_funcionario;
   }

   public function setNomeF($nF){
       $this->nome_funcionario = $nF;
   }

   public function getTelefoneF(){
    return $this->telefone_funcionario;
   }

   public function setTelefoneF($tF){
    $this->telefone_funcionario = $tF;
   }

   public function getFuncao(){
  return $this->funcao;
   }

   public function setFuncao($fun){
  $this->funcao = $fun;
   }

   public function getCpfF(){
       return $this->cpf_funcionario;
   }

   public function setCpfF($cF){
       $this->cpf_funcionario = $cF;
   }

   public function getDataF(){
    return $this->data_nascimento_funcionario;
    }

    public function setDataF($dF){
    $this->data_nascimento_funcionario = $dF;
    }

   public function getEmailF(){
    return $this->email_funcionario;
    }

    public function setEmailF($eF){
    $this->email_funcionario = $eF;
    }

    public function getSenhaF(){
    return $this->senha_funcionario;
    }
    
    public function setSenhaF($sF){
    $this->senha_funcionario = $sF;
    }

    public function getEndereco(){
       return $this->endereco;
    }

    public function setEndereco($en){
       $this->endereco = $en;
    }

    public function getNivel(){
    return $this->nivel;
    }
        
    public function setNivel($ni){
    $this->nivel = $ni;
    }
}


?>
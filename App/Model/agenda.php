<?php

namespace App\Model;

class Agenda{
  
    private $cod_agenda, $hora_agenda, $data_agenda;
 
    public function getCod(){
        return $this->cod_agenda;
   }

    public function setCod($cod){
    $this->cod_agenda = $cod;
   }

    public function getHora(){
    return $this->hora_agenda;
    }

    public function setHora($h){
    $this->hora_agenda = $h;
    }

    public function getDataA(){
    return $this->data_agenda;
    }
    
    public function setDataA($dat){
    $this->data_agenda = $dat;
    }
}


?>

<?php

namespace App\Model;

class Conexao {
 
   private static $instance;

   public static function getConn(){

       if(!isset(self::$instance)):
            define( 'MYSQL_HOST', 'localhost' );
            define( 'MYSQL_USER', 'root' );
            define( 'MYSQL_PASSWORD', '' );
            define( 'MYSQL_DB_NAME', 'salao' );
            define( 'MYSQL_CHARSET', 'utf8' );
            self::$instance = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME . ';charset=' . MYSQL_CHARSET, MYSQL_USER, MYSQL_PASSWORD );
       endif;
       return self::$instance;
    }
}

/*class Dados {

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
 
 }*/


?>

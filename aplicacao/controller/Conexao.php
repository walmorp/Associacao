<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/FuncaoSistema.php');

class Conexao extends FuncaoSistema {

 private $conexao;
 
 public function __construct() {
   $this->initialize();
 }

 private function initialize() {
   $UserBanco = "SYSDBA";
   $PwBanco   = "masterkey";
 //Print "<br><br>Conectando ao banco de dados: $Banco - Usuário: $UserBanco<br>"; 
   $this->conexao = ibase_connect(__BD_, $UserBanco, $PwBanco);

   If ( ibase_errmsg() <> "" ) {
      Print("<br>Erro ao connectar banco de dados!!<br>".ibase_errmsg()); 
   }
   ini_set ("ibase.timestampformat" ,"%m/%d/%Y %H:%M:%S");
   ini_set ("ibase.dateformat", "%m/%d/%Y");
 }            

 public function getConexao() {
   //Print "<br>Conexão: $this->conexao"; 
   return $this->conexao;
 }

 public function fecha() {
   @ibase_close($this::getConexao());
   If ( ibase_errmsg() <> "" ) {
      Print("Erro no comando SQL - Close <br><br>".ibase_errmsg());  
   }
   return true;
 }

 public function freeResult($r) {
   @Ibase_free_result($r);
   If ( ibase_errmsg() <> "" ) {
       Print("Erro no comando SQL - Free_result <br><br>".ibase_errmsg());  
   }
   return true;
 }

 public function query($sql) {
   $r = @ibase_query(self::getConexao(), $sql);
   If ( ibase_errmsg() <> "" ) {
       Print "<br><br><br><br><center><div><h2 class=\"tituloCadastro\">";
       If ( count(explode("PRIMARY", ibase_errmsg())) > 1 ) {
          Print("Duplicidade de código (chave primária) ou campo definido valor único!<br><br>");
       } else If ( count(explode("FOREIGN KEY", ibase_errmsg())) > 1 ) {
          Print("Registro não pode ser excluído por haver dependências!<br><br>");
       } else If ( count(explode("DATA_NASCIMENTO_INVALIDA", ibase_errmsg())) > 1 ) {
          Print("Data de nascimento menor que a permitida!<br><br>");
       } else {
          Print("Erro ao executar a tarefa!<br><br>");  
       }
       Print "</h2></div></center>";
       return false;
   }
   return $r;
 }

}

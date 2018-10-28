<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/View.php');

class DaoLoginAPP extends Conexao implements View {
 const CLASSE_VIEW="LoginAPP";

 public function getClassView() {
     return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }
 
 public function execLogin() {
   $id  = "0".self::getCampo("id");
   $cpf = self::getCampo("cpf");
   $sql = "SELECT ID, NOME FROM ASSOCIADO WHERE ID = '$id' AND CPF = '$cpf'";
   $r = self::query($sql);
   $associado = "";

   if ($row = ibase_fetch_object($r)) {
      $id = $row->ID;
      $associado = $row->NOME;
   } else {
      Print "<Script LANGUAGE=\"JavaScript\">alert ('Acesso não autorizado!');</Script>";
      if ((!defined('__TEST_'))     or ('__TEST_'     === '')) {
         header("Location: index.php"); 
      }
      return true;
    }
    return $associado;
 }
}
?> 

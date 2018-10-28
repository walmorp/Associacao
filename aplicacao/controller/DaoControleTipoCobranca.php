<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Cadastro.php');
require_once (__APP_.'model/TipoCobranca.php');
require_once (__APP_.'controller/Conexao.php');
 
class DaoControleTipoCobranca extends Conexao implements Cadastro {
 const CLASSE_MODEL="TipoCobranca";

 public function getTabela() {
     return TipoCobranca::getTabela();
 }

 public function getClassModel() {
     return self::CLASSE_MODEL;
 }

 public function getClassView() {
     return "Controle".self::CLASSE_MODEL;
 }
 
 public function executaView() {
  require_once (__APP_.'view/'.self::getClassView().'.php');
  return true;
 }
  
 public function gravar() {
  $id = $this::getCampo("id", "0");
  if ($this::existe($id)) {
     return $this::altera();
  } else {
     return $this::insere();
  }
 }
  
 public function existe($id) {
  if ($this::ler($id)["ID"]=="") {
     return false;
  } else {
     return true;
  }
 }
  
 public function insere() {
  $id        = $this::retornaProximoID($this);
  $descricao = $this::getCampo("descricao");
  $sigla     = $this::getCampo("sigla");
  $sql = "INSERT INTO ".$this::getTabela()." (ID, DESCRICAO, SIGLA)  
          VALUES ($id, '$descricao', '$sigla');";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function altera() {
  $id        = $this::getCampo("id");
  $descricao = $this::getCampo("descricao");
  $sigla     = $this::getCampo("sigla");
  $sql = "UPDATE ".$this::getTabela()."
             SET DESCRICAO = '$descricao',
                 SIGLA = '$sigla'
           WHERE (ID = $id);";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function apaga($id) {
  $sql = "DELETE FROM ".$this::getTabela()." WHERE (ID = $id);";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function ler($id) {
  $Dados = self::ConsultarDados($this, $id);
  return $Dados;
 }
  
 public function lista($filtro="") {
  $where="";
  if ($filtro!="") {
     $where="WHERE DESCRICAO LIKE '%$filtro%'";
  }
  $sql = "SELECT * FROM ".$this::getTabela()." $where ORDER BY 2;";
  $Opera = "A;D;C;";
  self::mostraTabelaBDConectado($this, $sql, $Opera, false);
  return true;
 }
}

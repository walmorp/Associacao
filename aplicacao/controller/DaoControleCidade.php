<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Cadastro.php');
require_once (__APP_.'model/Cidade.php');
require_once (__APP_.'controller/Conexao.php');
 
class DaoControleCidade extends Conexao implements Cadastro {
 const CLASSE_MODEL="Cidade";

 public function getTabela() {
     return Cidade::getTabela();
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
  $id      = $this::retornaProximoID($this);
  $nome    = $this::getCampo("nome");
  $siglaUF = $this::getCampo("siglaUF");
  $sql = "INSERT INTO ".$this::getTabela()." (ID, NOME, SIGLA_UF)  
          VALUES ($id, '$nome', '$siglaUF');";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function altera() {
  $id      = $this::getCampo("id");
  $nome    = $this::getCampo("nome");
  $siglaUF = $this::getCampo("siglaUF");
  $sql = "UPDATE ".$this::getTabela()."
             SET NOME = '$nome',
                 SIGLA_UF = '$siglaUF'
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
     $where="WHERE NOME LIKE '%$filtro%'";
  }
  $sql = "SELECT * FROM ".$this::getTabela()." $where ORDER BY 2;";
  $Opera = "A;D;C;";
  self::mostraTabelaBDConectado($this, $sql, $Opera, false);
  return true;
 }
}

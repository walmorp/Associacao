<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Cadastro.php');
require_once (__APP_.'model/Titulo.php');
require_once (__APP_.'controller/Conexao.php');
 
class DaoControleTitulo extends Conexao implements Cadastro {
 const CLASSE_MODEL="Titulo";

 public function getTabela() {
     return Titulo::getTabela();
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
  $id               = $this::retornaProximoID($this);
  $numeroTitulo     = $this::getCampo("numeroTitulo");
  $idAssociado      = $this::getCampo("idAssociado");
  $dataSocio        = $this::converteDataParaIB($this::getCampo("dataSocio"));
  $idTipoTitulo     = $this::getCampo("idTipoTitulo");
  $idSituacaoTitulo = $this::getCampo("idSituacaoTitulo");
  $sql = "INSERT INTO ".$this::getTabela()." (ID, NUMERO_TITULO, ID_ASSOCIADO, DATA_SOCIO, ID_TIPO_TITULO, ID_SITUACAO_TITULO) 
                      VALUES ('$id', '$numeroTitulo', '$idAssociado', $dataSocio, '$idTipoTitulo', '$idSituacaoTitulo')";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function altera() {
  $id               = $this::getCampo("id");
  $numeroTitulo     = $this::getCampo("numeroTitulo");
  $idAssociado      = $this::getCampo("idAssociado");
  $dataSocio        = $this::converteDataParaIB($this::getCampo("dataSocio"));
  $idTipoTitulo     = $this::getCampo("idTipoTitulo");
  $idSituacaoTitulo = $this::getCampo("idSituacaoTitulo");
  $sql = "UPDATE ".$this::getTabela()."
             SET NUMERO_TITULO = '$numeroTitulo',
                 ID_ASSOCIADO = '$idAssociado',
                 DATA_SOCIO = $dataSocio,
                 ID_TIPO_TITULO = '$idTipoTitulo',
                 ID_SITUACAO_TITULO = '$idSituacaoTitulo'
           WHERE ID = $id";
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
     $where=" AND A.NOME||' '||A.CPF LIKE '%$filtro%'";
  }
  $idSituacaoTitulo = " > 0"; 
  if ($this::getCampo("opST", "A")=="I") {
    $idSituacaoTitulo = " <> 1";
  } else {
    $idSituacaoTitulo = " = 1"; 
  }
  $sql = "SELECT T.ID AS CODIGO, T.NUMERO_TITULO, TT.TIPO, A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.DATA_SOCIO, S.SITUACAO
          FROM TITULO T LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                        LEFT JOIN ASSOCIADO A ON T.ID_ASSOCIADO = A.ID
                        LEFT JOIN SITUACAO_TITULO S ON T.ID_SITUACAO_TITULO = S.ID 
         WHERE T.ID_SITUACAO_TITULO $idSituacaoTitulo 
               $where
         ORDER BY T.NUMERO_TITULO";
  $Opera = "A;D;C;";
  self::mostraTabelaBDConectado($this, $sql, $Opera, false);
  return true;
 }
}

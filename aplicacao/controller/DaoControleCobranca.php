<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Cadastro.php');
require_once (__APP_.'model/Cobranca.php');
require_once (__APP_.'controller/Conexao.php');
 
class DaoControleCobranca extends Conexao implements Cadastro {
 const CLASSE_MODEL="Cobranca";

 public function getTabela() {
     return Cobranca::getTabela();
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
  if ($this::ler($id)["ID"]=="0") {
     return false;
  } else {
     return true;
  }
 }
  
 public function insere() {
  $id              = $this::retornaProximoID($this);
  $idTitulo        = $this::getCampo("idTitulo");
  $idTipoCobranca  = $this::getCampo("idTipoCobranca");
  $idSituacaoBaixa = $this::getCampo("idSituacaoBaixa");
  $dataVencimento  = $this::converteDataParaIB($this::getCampo("dataVencimento"));
  $valorNominal    = doubleval("0".$this::getCampo("valorNominal"));
  $valorAcrescimo  = doubleval("0".$this::getCampo("valorAcrescimo"));
  $valorAbatimento = doubleval("0".$this::getCampo("valorAbatimento"));
  $valorBaixado    = doubleval("0".$this::getCampo("valorBaixado"));

  if ($valorNominal + $valorAcrescimo - $valorAbatimento != $valorBaixado   ) {
      $idSituacaoBaixa   = 1;
      $dataBaixa         = "null";
      $dataRegistroBaixa = "null";
  } else {
      $idSituacaoBaixa   = 2;
      $dataBaixa         = $this::converteDataParaIB($this::getCampo("dataBaixa"));
      $dataRegistroBaixa = $this::converteDataParaIB($this::getCampo("dataRegistroBaixa"));
  }
  $idAssociado = $this::lerAssociadoTitulo($idTitulo);
  
  $sql = "INSERT INTO ".$this::getTabela()." (ID, ID_TITULO, ID_ASSOCIADO, ID_TIPO_COBRANCA, ID_SITUACAO_BAIXA, 
		       DATA_REGISTRO_PARCELA, DATA_VENCIMENTO, 
		       VALOR_NOMINAL, VALOR_ACRESCIMO, VALOR_ABATIMENTOS, VALOR_BAIXADO) 
                VALUES ('$id', '$idTitulo', '$idAssociado', '$idTipoCobranca', '$idSituacaoBaixa', 
		       current_timestamp, $dataVencimento, 
		       $valorNominal, $valorAcrescimo, $valorAbatimento, $valorBaixado)";
  $re = $this::query($sql);
  if (!$re) {
     return false;
  }
  return true;
 }
 
 public function lerAssociadoTitulo($idTitulo) {
  $sql = "SELECT ID_ASSOCIADO FROM TITULO WHERE ID = $idTitulo";
  $r = $this::query($sql);
  if ($row = ibase_fetch_object($r)) {
     return $row->ID_ASSOCIADO;
  } else {
     Print "Titulo sem associado relacionado!";
     return false;
  }
     
 }
  
 public function altera() {
  $id              = $this::getCampo("id");
  $idTitulo        = $this::getCampo("idTitulo");
  $idAssociado     = $this::getCampo("idAssociado");
  $idTipoCobranca  = $this::getCampo("idTipoCobranca");
  $idSituacaoBaixa = $this::getCampo("idSituacaoBaixa");
  $dataVencimento  = $this::converteDataParaIB($this::getCampo("dataVencimento"));
  $valorNominal    = doubleval("0".$this::getCampo("valorNominal"));
  $valorAcrescimo  = doubleval("0".$this::getCampo("valorAcrescimo"));
  $valorAbatimento = doubleval("0".$this::getCampo("valorAbatimento"));
  $valorBaixado    = doubleval("0".$this::getCampo("valorBaixado"));

  if ($valorNominal + $valorAcrescimo - $valorAbatimento != $valorBaixado   ) {
      $idSituacaoBaixa   = 1;
      $dataBaixa         = "null";
      $dataRegistroBaixa = "null";
  } else {
      $idSituacaoBaixa   = 2;
      $dataBaixa         = $this::converteDataParaIB($this::getCampo("dataBaixa"));
      $dataRegistroBaixa = $this::converteDataParaIB($this::getCampo("dataRegistroBaixa"));
  }
  
  if (trim($idAssociado) == "") {
     $idAssociado = $this::lerAssociadoTitulo($idTitulo);
  }
  
  $sql = "UPDATE ".$this::getTabela()."
                SET ID_TITULO = '$idTitulo',
                    ID_ASSOCIADO = '$idAssociado',
                    ID_TIPO_COBRANCA = '$idTipoCobranca',
                    ID_SITUACAO_BAIXA = '$idSituacaoBaixa',
                    DATA_VENCIMENTO = $dataVencimento,
                    DATA_BAIXA = $dataBaixa,
		    DATA_REGISTRO_BAIXA = $dataRegistroBaixa, 
                    VALOR_NOMINAL = $valorNominal,
                    VALOR_ACRESCIMO = $valorAcrescimo,
                    VALOR_ABATIMENTOS = $valorAbatimento,
                    VALOR_BAIXADO = $valorBaixado
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
  $idTipoCobranca  = self::getCampo("idTipoCobranca");
  $idSituacaoBaixa = self::getCampo("idSituacaoBaixa");
  $idTitulo        = self::getCampo("idTitulo");
  $idAssociado     = self::getCampo("idAssociado");
  $where="WHERE 1=1";
  if ($filtro!="") {
      $where=" AND A.NOME||' '||A.CPF LIKE '%$filtro%'";
  }
  if (($idTipoCobranca !="") && ($idTipoCobranca !="[Selecione...]")) {
      $where .= " AND CB.ID_TIPO_COBRANCA = $idTipoCobranca ";
  }
  if (($idSituacaoBaixa !="") && ($idSituacaoBaixa !="[Selecione...]")) {
      $where .= " AND CB.ID_SITUACAO_BAIXA = $idSituacaoBaixa ";
  }
  if (($idTitulo !="") && ($idTitulo !="[Selecione...]")) {
      $where .= " AND CB.ID_TITULO = $idTitulo ";
  }
  if (($idAssociado !="") && ($idAssociado !="[Selecione...]")) {
      $where .= " AND CB.ID_ASSOCIADO = $idAssociado ";
  }
  $sql = "SELECT CB.ID AS PARCELA, TC.DESCRICAO, CB.DATA_VENCIMENTO, CB.VALOR_NOMINAL, CB.VALOR_BAIXADO, S.SITUACAO,
               A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.NUMERO_TITULO, TT.TIPO
          FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                            LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                            LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                            LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                            LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
         $where         
         ORDER BY CB.DATA_VENCIMENTO, T.NUMERO_TITULO";
  $Opera = "A;D;C;B;I;";
  self::mostraTabelaBDConectado($this, $sql, $Opera, false);
  return true;
 }
}

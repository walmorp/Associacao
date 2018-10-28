<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/View.php');

class DaoBaixarParcela extends Conexao implements View {
 const CLASSE_VIEW="BaixarParcela";

 public function getClassView() {
     return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }

 public function getParcela() {
  $id   = self::getCampo("id");
  $sql = "SELECT CB.*, S.SITUACAO, A.NOME AS ASSOCIADO, A.CPF, T.NUMERO_TITULO, TC.DESCRICAO
          FROM COBRANCA CB  LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID
                            LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
                            LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                            LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
         WHERE CB.ID = $id
         ORDER BY CB.DATA_VENCIMENTO, T.NUMERO_TITULO";
  $r = self::query($sql);
  return $r;
 }
 
 public function gravar() {
  $id              = self::getCampo("id");
  $dataBaixa       = self::converteDataParaIB(self::getCampo("dataBaixa"));
  $valorNominal    = doubleval("0".self::getCampo("valorNominal"));
  $valorAcrescimo  = doubleval("0".self::getCampo("valorAcrescimo"));
  $valorAbatimento = doubleval("0".self::getCampo("valorAbatimento"));
  $valorBaixado    = doubleval("0".self::getCampo("valorBaixado"));

  if ($valorNominal + $valorAcrescimo - $valorAbatimento != $valorBaixado   ) {
     $idSituacaoBaixa   = 1;
     $dataBaixa         = "null";
     $dataRegistroBaixa = "null";
  } else {
     $idSituacaoBaixa   = 2;
     $dataBaixa         = self::converteDataParaIB(self::getCampo("dataBaixa"));
     $dataRegistroBaixa = "current_timestamp";
  }

  $gravou=true;
  if ($id != 0) {
     $sql = "SELECT * FROM COBRANCA WHERE ID = $id";
     
     $r = self::query($sql);
     
     print "<br><br><center><div><h2>";
     if ($row = ibase_fetch_object($r)) {
        $sql = "UPDATE COBRANCA
               SET ID_SITUACAO_BAIXA = $idSituacaoBaixa,
                   DATA_BAIXA = $dataBaixa,
                   DATA_REGISTRO_BAIXA = $dataRegistroBaixa,
                   VALOR_ACRESCIMO = '$valorAcrescimo',
                   VALOR_ABATIMENTOS = '$valorAbatimento',
                   VALOR_BAIXADO = '$valorBaixado'
             WHERE ID = $id";
        $r = self::query($sql);
        
        if (!$r) {
           print "Parcela não gravada";
           $gravou=false;
        } else {
           print "Parcela gravada";
           $gravou=true;
        }
    }
    print "</h2></div></center>";
    print "<br><br><center><div><h2><a href=\"JavaScript:history.go(-2)\" title=\"Retorna para página com a lista.\">&nbsp;Volta&nbsp;</a></h2></div></center>";
  }
  return $gravou;
 }
}
?> 

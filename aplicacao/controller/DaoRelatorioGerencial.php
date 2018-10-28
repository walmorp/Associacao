<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/Relatorio.php');

class DaoRelatorioGerencial extends Conexao implements Relatorio {
 const CLASSE_VIEW="RelatorioGerencial";

 public function getClassView() {
     return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }

 public function mostraRelatorio() {
  $where = "WHERE 1=1";
  $idTipoCobranca  = self::getCampo("idTipoCobranca");
  $idSituacaoBaixa = self::getCampo("idSituacaoBaixa");
  $idTitulo        = $this::getCampo("idTitulo");
  $idAssociado     = $this::getCampo("idAssociado");
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
  $MostrarMetaDados = false;
  $sql = "SELECT CB.ID AS PARCELA, TC.DESCRICAO, CB.DATA_VENCIMENTO, CB.VALOR_NOMINAL, 
                 CB.VALOR_BAIXADO, S.SITUACAO,
                 A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.NUMERO_TITULO, TT.TIPO, ST.SITUACAO AS SITUACAO_TITULO
          FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                            LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                            LEFT JOIN SITUACAO_TITULO ST ON T.ID_SITUACAO_TITULO = ST.ID 
                            LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                            LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                            LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
          $where
         UNION
          SELECT NULL AS PARCELA, NULL AS DESCRICAO, 'Quantidade: ' || COUNT(*) AS DATA_VENCIMENTO, 
                 SUM(CB.VALOR_NOMINAL) AS VALOR_NOMINAL, SUM(CB.VALOR_BAIXADO) AS VALOR_BAIXADO, NULL AS SITUACAO,
                 NULL AS ASSOCIADO, NULL AS NUMERO_TITULO, NULL AS TIPO, NULL AS SITUACAO_TITULO
          FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                            LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                            LEFT JOIN SITUACAO_TITULO ST ON T.ID_SITUACAO_TITULO = ST.ID 
                            LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                            LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                            LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
          $where
         ORDER BY 7 NULLS LAST, 3, 8";
  $Opera = "B;I;";
  $this::mostraTabelaBDConectado($this, $sql, $Opera, $MostrarMetaDados);
  return true;
 }
}
?>
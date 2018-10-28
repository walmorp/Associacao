<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/Relatorio.php');

class DaoRelatorioCobrador extends Conexao implements Relatorio {
 const CLASSE_VIEW="RelatorioCobrador";

 public function getClassView() {
     return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }

 public function mostraRelatorio() {
  $MostrarMetaDados = false;
  $sql = "SELECT CB.ID_ASSOCIADO ||'-'|| A.NOME||' ('||A.CPF||')' AS \"Associado\", 
                 A.ENDERECO AS \"Endereço\", C.NOME||'/'||C.SIGLA_UF AS \"Cidade/UF\",
                 T.NUMERO_TITULO AS \"Título\",
                 CB.ID AS \"Parcela\", TC.DESCRICAO AS \"Tipo de cobrança\", CB.DATA_VENCIMENTO AS \"Vencimento\", 
                 CB.VALOR_NOMINAL AS \"Valor\", CB.VALOR_ACRESCIMO AS \"Acréscimo\", 
                 CB.VALOR_ABATIMENTOS AS \"Abatimento\", CB.VALOR_BAIXADO AS \"Pagamento\",
                 '<br><br>' AS \"Observações\"
          FROM COBRANCA CB LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                           LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                           LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                           LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                           LEFT JOIN CIDADE C ON C.ID = A.ID_CIDADE
                           LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
         WHERE CB.ID_SITUACAO_BAIXA = 1
           AND (CB.DATA_VENCIMENTO < CURRENT_DATE
             OR EXTRACT(MONTH FROM CB.DATA_VENCIMENTO)||'-'||EXTRACT(YEAR FROM CB.DATA_VENCIMENTO)
                   = EXTRACT(MONTH FROM CURRENT_DATE)||'-'||EXTRACT(YEAR FROM CURRENT_DATE))
         ORDER BY A.NOME, CB.DATA_VENCIMENTO, T.NUMERO_TITULO";
  $Opera = "";
  $this::mostraTabelaBDConectado($this, $sql, $Opera, $MostrarMetaDados);
  return true;
 }
}
?> 

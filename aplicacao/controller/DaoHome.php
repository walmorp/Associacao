<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/View.php');

class DaoHome extends Conexao implements View {

 const CLASSE_VIEW="Home";

 public function getClassView() {
   return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }

 public function mostraParcelasEmAberto() {
     
  $MostrarMetaDados = false;
  
  $sql = "SELECT CB.ID AS PARCELA, TC.DESCRICAO, CB.DATA_VENCIMENTO, CB.VALOR_NOMINAL, CB.VALOR_BAIXADO, S.SITUACAO,
                 CB.ID_ASSOCIADO ||'-'|| A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.NUMERO_TITULO, TT.TIPO
          FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                            LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                            LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                            LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                            LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID
         WHERE CB.ID_SITUACAO_BAIXA = 1
         ORDER BY A.NOME, CB.DATA_VENCIMENTO, T.NUMERO_TITULO";
  $Opera = "B;I;";
  $this::mostraTabelaBDConectado($this, $sql, $Opera, $MostrarMetaDados);
  return true;
 }

 public function mostraAssociadosAtivos() {
     
  $MostrarMetaDados = false;
  
  $sql = "SELECT A.ID AS CODIGO, A.NOME AS ASSOCIADO, G.NOME AS GENERO, A.CPF, C.NOME ||'/'||C.SIGLA_UF AS CIDADE, S.SITUACAO
          FROM ASSOCIADO A LEFT JOIN GENERO G ON A.ID_GENERO = G.ID
                           LEFT JOIN CIDADE C ON A.ID_CIDADE = C.ID
                           LEFT JOIN SITUACAO_ASSOCIADO S ON A.ID_SITUACAO = S.ID
         WHERE A.ID_SITUACAO = 1                   
         ORDER BY 2";
  $Opera = "P;";
  $this::mostraTabelaBDConectado($this, $sql, $Opera, $MostrarMetaDados);
  return true;
 }

 public function mostraTitulosAtivos() {
     
  $MostrarMetaDados = false;
  
  $sql = "SELECT T.ID AS CODIGO, T.NUMERO_TITULO, TT.TIPO, A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.DATA_SOCIO, S.SITUACAO
          FROM TITULO T LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                        LEFT JOIN ASSOCIADO A ON T.ID_ASSOCIADO = A.ID
                        LEFT JOIN SITUACAO_TITULO S ON T.ID_SITUACAO_TITULO = S.ID 
         WHERE T.ID_SITUACAO_TITULO = 1               
         ORDER BY T.NUMERO_TITULO";
  $Opera = "P;";
  $this::mostraTabelaBDConectado($this, $sql, $Opera, $MostrarMetaDados);
  return true;

 }
}
?>
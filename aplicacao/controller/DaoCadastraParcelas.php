<?php
require_once ('defineVar.php');
require_once (__APP_.'controller/Conexao.php');
require_once (__APP_.'model/View.php');

class DaoCadastraParcelas extends Conexao implements View {
 const CLASSE_VIEW="CadastraParcelas";

 public function getClassView() {
   return self::CLASSE_VIEW;
 }
 
 public function executaView() {
   require_once (__APP_.'view/'.self::getClassView().'.php');
   return true;
 }

 public function getTabela() {
   return "COBRANCA";
 }

 public function getParcelaProcessadas() {
   $WhereDataRegistro = "";
   if (isSet($_SESSION['dataRegistro'])) {
       if ($_SESSION['dataRegistro'] != "") {
          $WhereDataRegistro = "WHERE CB.DATA_REGISTRO_PARCELA = '" . $_SESSION['dataRegistro'] . "'";
       }
   }
   $_SESSION['dataRegistro'] = ""; // Inicializa Data Registro

   $sql = "SELECT CB.ID AS PARCELA, TC.DESCRICAO, CB.DATA_VENCIMENTO, CB.VALOR_NOMINAL, CB.DATA_REGISTRO_PARCELA,
                  A.NOME||' ('||A.CPF||')' AS ASSOCIADO, T.NUMERO_TITULO, TT.TIPO
             FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                               LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                               LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                               LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                               LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID 
            $WhereDataRegistro 
           union
           SELECT null, 'Total', null, sum(CB.VALOR_NOMINAL), null,
                  null, null, null
             FROM COBRANCA CB  LEFT JOIN TITULO T ON CB.ID_TITULO = T.ID
                               LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                               LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
                               LEFT JOIN TIPO_COBRANCA TC ON CB.ID_TIPO_COBRANCA = TC.ID 
                               LEFT JOIN SITUACAO_BAIXA S ON CB.ID_SITUACAO_BAIXA = S.ID 
            $WhereDataRegistro 
            ORDER BY 3 NULLS LAST, 8";
   $Opera = "";
   self::mostraTabelaBDConectado($this, $sql, $Opera, false);
   return true;
 }
 
 public function gravar() {
   $idTituloInicio = self::getCampo("idTituloInicio");
   $idTituloFinal  = self::getCampo("idTituloFinal");
   $idTitulo       = self::getCampo("idTitulo");
   $idTipoCobranca = self::getCampo("idTipoCobranca");
   $dataVencimento = self::converteDataParaIB(self::getCampo("dataVencimento"));
   $valorNominal   = doubleval("0".self::getCampo("valorNominal"));
   $dataRegistroParcela = "current_timestamp";
   $sql = "SELECT $dataRegistroParcela AS DATA_REGISTRO_PARCELA FROM RDB\$DATABASE";
   $r = $this::query($sql);
   if ($row = ibase_fetch_object($r)) {
      $dataRegistroParcela = $row->DATA_REGISTRO_PARCELA;
   }
   $_SESSION['dataRegistro'] = $dataRegistroParcela;

   $gravou=true;
   if (doubleval($idTitulo)> 0) {
     $sql = "SELECT * FROM COBRANCA 
              WHERE ID_TITULO = $idTitulo
                AND ID_TIPO_COBRANCA = $idTipoCobranca
                AND DATA_VENCIMENTO = $dataVencimento
                AND VALOR_NOMINAL = $valorNominal";
     $r = $this::query($sql);
     $Incluir = true;
     if ($row = ibase_fetch_object($r)) {
         $Incluir = false;
     } else {
         self::gravaCobranca($idTitulo, $idTipoCobranca, $dataVencimento, $valorNominal, $dataRegistroParcela);
     }
   } else {
       self::gravaVarios($idTituloInicio, $idTituloFinal, $idTitulo, $idTipoCobranca, $dataVencimento, $valorNominal, $dataRegistroParcela);
   }
   return $gravou;
}

function gravaVarios($idTituloInicio, $idTituloFinal, $idTitulo, $idTipoCobranca, $dataVencimento, $valorNominal, $dataRegistroParcela) {
    $WereSituacaoTitulo = "";
    if ($idTitulo == "Ativos") {
        $WereSituacaoTitulo = "AND T.ID_SITUACAO_TITULO = 1";
    } else if ($idTitulo == "NaoAtivos") {
        $WereSituacaoTitulo = "AND T.ID_SITUACAO_TITULO <> 1";
    }
  $sql = "SELECT T.ID
            FROM TITULO T
           WHERE T.ID BETWEEN $idTituloInicio AND $idTituloFinal
                 $WereSituacaoTitulo
             ";
  $r = $this::query($sql);
  while ($row = ibase_fetch_object($r)) {
      $id = $row->ID;
      self::gravaCobranca($id, $idTipoCobranca, $dataVencimento, $valorNominal, $dataRegistroParcela);
  }
  return true;
}

function gravaCobranca($idTitulo, $idTipoCobranca, $dataVencimento, $valorNominal, $dataRegistroParcela) {
  $sql = "SELECT ID_ASSOCIADO FROM TITULO WHERE ID = $idTitulo";
  $r = $this::query($sql);
  if ($row = ibase_fetch_object($r)) {
     $idAssociado = $row->ID_ASSOCIADO;
     $id  = self::retornaProximoID($this);
     $sql = "INSERT INTO COBRANCA (ID, ID_TITULO, ID_ASSOCIADO, ID_TIPO_COBRANCA, ID_SITUACAO_BAIXA, 
	                           DATA_REGISTRO_PARCELA, DATA_VENCIMENTO, VALOR_NOMINAL, VALOR_ACRESCIMO, VALOR_ABATIMENTOS, VALOR_BAIXADO) 
                           VALUES ('$id', '$idTitulo', '$idAssociado', '$idTipoCobranca', '1', 
 		   	           '$dataRegistroParcela', $dataVencimento, $valorNominal, 0, 0, 0)";

     $r = $this::query($sql);
  }
  return true;
 }
}
?> 

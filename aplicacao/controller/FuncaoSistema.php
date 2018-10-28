<?php
require_once ('defineVar.php');
class FuncaoSistema {
    /**
     * @covers FuncaoSistema::opcaoSelecione
     * @todo   Implement testOpcaoSelecione().
     */
 public function opcaoSelecione() {
    return "[Selecione...]";
 }

 public function getCampo($Campo, $Default = "") {
    $Valor = self::getCampoFalse($Campo); 
    if ( $Valor == false) {
       return $Default;
    }
    return $Valor;
 }

 public function getCampoFalse($Campo) {
    if (isSet($_POST[$Campo])) {   
       return $_POST[$Campo];
    } else if (isSet($_GET[$Campo])) {   
       return $_GET[$Campo];
    }
    return false;
 }

 public function campoExiste($Campo) {
    if (isSet($_POST[$Campo])) {   
       return true;
    } else if (isSet($_GET[$Campo])) {   
       return true;
    }
    return false;
 }

 public function arrumaDataHora($Data) { // mm-dd-aaaa 00:00:00
    if ($Data == "00-00-0000 00:00:00") {
       return "";
    }
    $arrumaData = "";
    $datahora = explode(" ",$Data);
    $data = explode("-",str_replace("/", "-", $datahora[0]));
    if (sizeof($datahora)>0){
	if (sizeof($data)>2){
	   $arrumaData = $data[1]."/".$data[0]."/".$data[2];
        if (sizeof($data)>1){
           $arrumaData = $arrumaData." ".$datahora[1];
        }   
      }  
    }
    return $arrumaData;
 }

 public function arrumaData($Data) { // mm-dd-aaaa
    if ($Data == "00-00-0000") {
       return "";
    }
    $arrumaData = "";
    $datahora = explode(" ",$Data);
    $data = explode("-",str_replace("/", "-", $datahora[0]));
    if (sizeof($datahora)>0){
      if (sizeof($data)>2){
		$arrumaData = $data[1]."/".$data[0]."/".$data[2];
        if (sizeof($data)>1){
           $arrumaData = $arrumaData;
        }   
      }  
    }
    return $arrumaData;
 }

 public function formataValorDecimal($valor) {
  IF ( ($valor==Null) || ($valor=="") ) {
      Return ""; 
  } 
  Return number_format($valor, 2, '.', '');
 }

 public function converteDataParaIB($Data) {
  IF ( ($Data==Null) || ($Data=="") ) {
      Return "Null"; 
  } 
  $data=$Data;
  $dataParte = explode("/", $data);
  IF ( IsSet($dataParte[0]) && IsSet($dataParte[1]) && IsSet($dataParte[2]) ) {
     IF ( checkdate($dataParte[1], $dataParte[0], $dataParte[2]) ) {
        $data=$dataParte[2]."/".$dataParte[1]."/".$dataParte[0];
     } ELSE {
	$data="Data inválida"; 
     }
  } ELSE {
	$data="Data inválida"; 
  } 
  Return "'".$data."'";
 }

public function converteDataHoraParaIB($Data) {
  IF ( ($Data==Null) || ($Data=="") ) {
      Return "Null"; 
  } 
  $data=$Data;
  $dataHoraParte = explode(" ", $data);
  $dataParte = explode("/", $dataHoraParte[0]);
  IF ( IsSet($dataParte[0]) && IsSet($dataParte[1]) && IsSet($dataParte[2]) ) {
     IF ( checkdate($dataParte[1], $dataParte[0], $dataParte[2]) ) {
        $data=$dataParte[2]."/".$dataParte[1]."/".$dataParte[0]." ".$dataHoraParte[1];
     } ELSE {
	$data="Data/hora inválida"; 
     }
   } ELSE {
      $data="Data/hora inválida"; 
  }
  Return "'".$data."'";
 }
 
 public function iniciaDados($obj) {
  $sql = "SELECT FIRST 1 * FROM ".$obj::getTabela();
  $r = $obj::query($sql);
  $Dados = self::MontaDados($r);  
  if (!$Dados) {
     return false;
  } 
  foreach($Dados as $key => $value) {
    $Dados[$key] = "";
  }
  return $Dados;
 }

 public function alterarDados($obj, $id) {
    $Dados = self::ConsultarDados($obj, $id);
    return $Dados;
 }

 public function apagarDados($obj, $id) {
  $sql = "DELETE FROM ".$obj::getTabela()." WHERE ID = $id";
  $r = $obj::query($sql);
  if (!$r) {
     return false;
  } else {
     return self::IniciaDados($obj);
  }
 }

 public function consultarDados($obj, $id) {
  $sql = "SELECT * FROM ".$obj::getTabela()." WHERE ID = $id";

  $r = $obj::query($sql);
  
  if (!$r) {
      return self::IniciaDados($obj); 
  } else {
      $Dados = self::MontaDados($r);
      if (!$Dados) {
         return self::IniciaDados($obj); 
      } else {
         return $Dados;
      }
  }
 }

 public function montaDados($r) {
  if (!$r) {
     return false;
  }
  if ($row = ibase_fetch_object($r)) {
    $Dados = array();
    foreach($row as $key => $value) {
      $Dados[$key] = $value;
    }
    return $Dados;
  }
 }

 public function mostraCampoID($id){
    return "<div class='campoID' name='labelID' id='labelID'>&nbsp;$id</div><input class='campo' name='id' type='hidden' id='id' value='$id' />";
 }

 public function retornaProximoID($obj) {
    $id = 0;
    $sql = "SELECT MAX(ID) AS ID FROM ".$obj::getTabela();
    $r = $obj::query($sql);
    if ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
    }
    $id++; 
    Return $id;
 } 

 public function mostraTabelaBDConectado($obj, $sql, $Opera, $MostrarMetaDados = false) {
     $class="class=".$obj::getClassView()."&";
     $opSituacao = "";
     if (self::campoExiste("opSA")) {
         $opSituacao .= "opSA=".self::getCampo("opSA", "A")."&";
     } 
     if (self::campoExiste("opST")) {
         $opSituacao .= "opST=".self::getCampo("opST", "A")."&";
     }
     if (self::campoExiste("OperaRParc")) {
         $OperaRParc = "I;";
     } else {
         $OperaRParc = "B;I;";
     }
     $Alterar   = substr_count(strtoupper($Opera), "A;") != 0;
     $Consultar = substr_count(strtoupper($Opera), "C;") != 0;
     $Deletar   = substr_count(strtoupper($Opera), "D;") != 0;
     $Baixar    = substr_count(strtoupper($Opera), "B;") != 0;
     $Imprimir  = substr_count(strtoupper($Opera), "I;") != 0;
     $RPAssoc   = substr_count(strtoupper($Opera), "P;") != 0;
     
     if ($Opera == "") {
        $MostraOpera = false;
     } else {
        $MostraOpera = true;
     }
     $r = $obj::query($sql);
     If ( !$r ) {
          Print "<H3>Query executada com erro!</H3>\n";
       } else {
         $tabelaOpera  = "";
         $campoIDOpera = "";
         if ( substr_count(strtoupper($sql), "SELECT") == 0 ) {
            Print "<H2>Query executada com sucesso!</H2>\n";
          } else {
            $Tipo = array(); 
            If ( $MostrarMetaDados ) {
                Print "<br>\n";
                Print "<Table class=\"tabela\" width=\"98%\" cellpadding=\"3\" cellspacing=\"0\">\n";
                Print "<tr>\n";
                Print "<th class=\"tabelath\">Tabela</th>\n";
                Print "<th class=\"tabelath\">Nome</th>\n";
                Print "<th class=\"tabelath\">Alias</th>\n";
                Print "<th class=\"tabelath\">Tamanho</th>\n";
                Print "<th class=\"tabelath\">Tipo</th>\n";
                Print "</tr>\n";
         
                $Coln = ibase_num_fields($r);

                for ( $i = 0; $i < $Coln; $i++ ) {
                    $col_info = ibase_field_info($r, $i);
                    $Tipo[$i] = $col_info['type'];
                    if ($i == 0) {
                       $tabelaOpera  = $col_info['relation'];
                       $campoIDOpera = $col_info['name'];
                    }
                    Print "<tr>\n";
                    Print "<td class=\"tabelatd\">".$col_info['relation']."</td>\n";
                    Print "<td class=\"tabelatd\">".$col_info['name']."</td>\n";
                    Print "<td class=\"tabelatd\">".$col_info['alias']."</td>\n";
                    Print "<td class=\"tabelatd\">".$col_info['length']."</td>\n";
                    Print "<td class=\"tabelatd\">".$col_info['type']."</td>\n";
                    Print "</tr>\n";
                }
                Print "</Table>\n";
            } else {
                $Coln = ibase_num_fields($r);
                for ( $i = 0; $i < $Coln; $i++ ) {
                    $col_info = ibase_field_info($r, $i);
                    $Tipo[$i] = $col_info['type'];
                    if ($i == 0) {
                       $tabelaOpera  = $col_info['relation'];
                       $campoIDOpera = $col_info['name'];
                    }
                }
                //$col_info = ibase_field_info($r, 0);
                //$tabelaOpera  = $col_info['relation'];
                //$campoIDOpera = $col_info['name'];
            }
            $idAreaImpressao = "div$tabelaOpera";
            Print "<input type=\"button\" onclick=\"imprimirDiv('$idAreaImpressao', this);\" value=\"Imprimir lista\"><div id='$idAreaImpressao'>\n";
            Print "<Table class=\"tabela\" width=\"100%\" border=\"1\" cellpadding=\"3\" cellspacing=\"0\">\n";
            Print "<tr>\n";
            $Coln = ibase_num_fields($r);
            for ( $i = 0; $i < $Coln; $i++ ) {
                $col_info = ibase_field_info($r, $i);
                Print "<th class=\"tabelath\" border=\"1\">".$col_info['alias']."</th>\n";
            }
            if ($MostraOpera) {
                Print "<th class=\"tabelath\" border=\"1\">OPERAÇÃO</th>\n";
            }
            Print "</tr>\n";
            $ContLinha = 0;
            while ( $line = @ibase_fetch_assoc($r) ) {
                $ContLinha++;
                if ($ContLinha % 2 == 1) {
                    $tabelatd = "tabelatd1";
                } else {
                    $tabelatd = "tabelatd2";
                }
                Print "\t<tr>\n";
                $id="*";
                $associado="*";
                $c=0;
                foreach ($line as $col_value) {
                    if ($associado=="**") {$associado=$col_value;}
                    if ($id=="*") {$id=$col_value; $associado="**"; }
                    $Valor = $col_value;
                    if ($Tipo[$c] == "DATE") {
                        $Valor = self::arrumaData($Valor);
                    } else if ($Tipo[$c] == "TIMESSTAMP") {
                        $Valor = self::arrumaDataHora($Valor);
                    } else if ($Tipo[$c] == "DECIMAL") {
                        $Valor = self::formataValorDecimal($Valor);
                    }
                    $c++;
                    Print "\t\t<td class=\"$tabelatd\">$Valor</td>\n";
                }
                if ($MostraOpera) {
                    $linksOpera = "";
                    if ($id=="") {
                       $linksOpera = "&nbsp;";
                    } else {
                       if ($Alterar)   { $linksOpera .= "<a class=\"noPrint\" href=\"?$class".$opSituacao."opera=A&id=$id\">[Alterar] </a>"; } 
                       if ($Consultar) { $linksOpera .= "<a class=\"noPrint\" href=\"?$class".$opSituacao."opera=C&id=$id\">[Consultar] </a>"; }
                       if ($Deletar)   { $linksOpera .= "<a class=\"noPrint\" href=\"?$class".$opSituacao."opera=D&id=$id\" onClick=\"return ConfirmaExclusao('');\">[Deletar&nbsp;registro] </a>"; } 
                       if ($Baixar)    { $linksOpera .= "<a class=\"noPrint\" href=\"?class=BaixarParcela&".$opSituacao."id=$id\">[Baixar&nbsp;parcela] </a>"; }
                       if ($Imprimir)  { $linksOpera .= "<a class=\"noPrint\" href=\"?class=ImprimirParcela&".$opSituacao."id=$id\">[Imprimir&nbsp;parcela] </a>"; }
                       if ($RPAssoc)   { $linksOpera .= "<a class=\"noPrint\" href=\"?class=RelacionaParcelasAssociado&".$opSituacao."opera=$OperaRParc&id=$id&associado=$associado\">[Relaciona&nbsp;parcelas] </a>"; }
                    }
                    Print "<th class=\"$tabelatd\" border=\"1\">$linksOpera</th>\n";
                }
                Print "\t</tr>\n";
            }
            Print "</Table>\n";
            Print "<h3>Número de registros na lista: $ContLinha</h3>\n";
            Print "</div>\n";
           }
       }
       return true;
 }

 public function mostraAviso($Tempo = 1, $TempoFim = 1800) {
  
  $sql = "SELECT A.NOME||' - '||A.CPF AS ASSOCIADO, COUNT(CB.DATA_VENCIMENTO) AS QUANTIDADE
          FROM COBRANCA CB LEFT JOIN ASSOCIADO A ON CB.ID_ASSOCIADO = A.ID
         WHERE CB.ID_SITUACAO_BAIXA = 1 
           AND CB.DATA_VENCIMENTO <= CURRENT_DATE - $Tempo
           AND CB.DATA_VENCIMENTO > CURRENT_DATE - $TempoFim
         GROUP BY 1
         ORDER BY 1";
     $r = $this::query($sql);

     $ContLinha = 0;
     $Aviso = "Associados com débitos acima de $Tempo dias: ";
     while ( $row = ibase_fetch_object($r) ) {
        $ContLinha++;
        $Quantidade = " - Possui ";
        if (intval($row->QUANTIDADE) == 1) {
            $Quantidade .= "1 pendencia";
        } else {
            $Quantidade .= $row->QUANTIDADE . " pendencias";
        }
        $Aviso .= "(" . $row->ASSOCIADO . " $Quantidade) ";
     }
     if ($ContLinha == 0) {
         Print "";
     } else {
         Print $Aviso;
     }
     return true;
 }

 public function popularAssociadoCadParcelas($obj) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   print "  <option value='Ativos'>Todos os associados com título ativo</option>\n";
   //print "  <option value='NaoAtivos'>Todos os associados com título não ativo</option>\n";
   //print "  <option value='Todos'>Todos</option>\n";
   
   $sql = "SELECT T.ID, T.NUMERO_TITULO || ' ('||S.SITUACAO ||') - '|| A.NOME||' ('||A.CPF||')' AS TITULO
             FROM TITULO T LEFT JOIN TIPO_TITULO TT ON T.ID_TIPO_TITULO = TT.ID
                        LEFT JOIN ASSOCIADO A ON T.ID_ASSOCIADO = A.ID
                        LEFT JOIN SITUACAO_TITULO S ON T.ID_SITUACAO_TITULO = S.ID 
            WHERE T.ID > 0 AND T.ID_SITUACAO_TITULO = 1 ORDER BY A.NOME, T.ID";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->TITULO;
       print "  <option value=\"$id\">$nome</option>\n";
   }
   return true;
 }

 public function popularAssociado($obj, $valorSelec, $situacao="") {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   if ($situacao="A") {
       $situacao=" AND ID_SITUACAO = 1 ";
   }
   $sql = "SELECT ID, NOME||COALESCE(' ('||CPF||')', '') as NOME FROM ASSOCIADO WHERE ID > 0 $situacao ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->NOME;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularTipoCobranca($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, DESCRICAO FROM TIPO_COBRANCA WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->DESCRICAO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularSituacaoBaixa($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, SITUACAO FROM SITUACAO_BAIXA WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->SITUACAO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularTitulo($obj, $valorSelec, $situacao="") {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   if ($situacao="A") {
       $situacao=" AND ID_SITUACAO_TITULO = 1 ";
   }
   $sql = "SELECT ID, NUMERO_TITULO FROM TITULO WHERE ID > 0 $situacao ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->NUMERO_TITULO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
     print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularTipoTitulo($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, TIPO FROM TIPO_TITULO WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->TIPO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularSituacaoTitulo($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, SITUACAO FROM SITUACAO_TITULO WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->SITUACAO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularGenero($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, NOME FROM GENERO WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->NOME;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularCidade($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, NOME||'/'||SIGLA_UF as NOME FROM CIDADE WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->NOME;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }

 public function popularSituacaoAssociado($obj, $valorSelec) {
   print "  <option>".self::opcaoSelecione()."</option>\n";
   $sql = "SELECT ID, SITUACAO FROM SITUACAO_ASSOCIADO WHERE ID > 0 ORDER BY 2";
   $r = $obj::query($sql);
   while ($row = ibase_fetch_object($r)) {
       $id = $row->ID;
       $nome = $row->SITUACAO;
       $selectd = "";
       if ($valorSelec == $id) {
           $selectd = " selected";
       }
       print "  <option value=\"$id\"$selectd>$nome</option>\n";
   }
   return true;
 }
}
?>
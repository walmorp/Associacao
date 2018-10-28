<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Baixar parcela</title>
    </head>
    <body>
<center><div><h1 class="tituloCadastro">Baixar parcela</h1></div></center>
<?php

 if ($this::campoExiste("Gravar")) {
    $this::gravar();
    exit;
 }
 $r = $this::getParcela();
 
 if ($row = ibase_fetch_object($r)) {
?> 
  <input type="button" onclick="JavaScript:history.back();" value="Voltar">
  <input type="button" onclick="imprimirDiv('idAreaImpressao', this);" value="Imprimir">
  <div id='idAreaImpressao'>
  <form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposBaixaParcela(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código da parcela:</td>
      <td class="campoCadastro"><?php print $this::mostraCampoID($row->ID);?></td>
      <td class="labelCadastro">Número do título:</td>
      <td class="campoCadastro"><?php print $row->NUMERO_TITULO;?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Nome&nbspdo&nbspassociado:</td>
      <td class="campoCadastro" colspan="3"><?php print $row->ASSOCIADO;?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Tipo de cobrança:</td>
      <td class="campoCadastro"><?php print $row->DESCRICAO;?></td>
      <td class="labelCadastro">Situação da baixa:</td>
      <td class="campoCadastro"><?php print $row->SITUACAO;?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Data do registro:</td>
      <td class="campoCadastro"><?php print $this::arrumaDataHora($row->DATA_REGISTRO_PARCELA);?></td>
      <td class="labelCadastro">Data do vencimento:</td>
      <td class="campoCadastro"><?php print $this::arrumaData($row->DATA_VENCIMENTO);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Data do baixa/Pagamento:</td>
      <td class="campoCadastro"><input class="campo" name="dataBaixa" type="text" onblur="FormataData(this);" id="dataBaixa" size="10" maxlength="10" value="<?php print $this::arrumaData($row->DATA_BAIXA);?>" /></td>
      <td class="labelCadastro">Data do registro da baixa:</td>
      <td class="campoCadastro"><?php print $this::arrumaDataHora($row->DATA_REGISTRO_BAIXA);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor nominal:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::formataValorDecimal($row->VALOR_NOMINAL);?>
	                                        <input name="valorNominal" type="hidden" id="valorNominal" value="<?php print $this::formataValorDecimal($row->VALOR_NOMINAL);?>" />
	  </td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor do acréscimo:</td>
      <td class="campoCadastro" colspan="3"><input class="campo" name="valorAcrescimo" type="text" onblur="FormataDecimal(this);" id="valorAcrescimo" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($row->VALOR_ACRESCIMO);?>" /></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor do abatimento:</td>
      <td class="campoCadastro" colspan="3"><input class="campo" name="valorAbatimento" type="text" onblur="FormataDecimal(this);" id="valorAbatimento" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($row->VALOR_ABATIMENTOS);?>" /></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor baixado/Pago:</td>
      <td class="campoCadastro" colspan="3"><input class="campo" name="valorBaixado" type="text" onblur="FormataDecimal(this);" id="valorBaixado" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($row->VALOR_BAIXADO);?>" /></td>
    </tr>
    <tr>
        <td colspan="2"><br><input class="botaoBaixar" type="Submit" value="&nbsp&nbsp&nbsp&nbsp Baixar parcela >> &nbsp&nbsp&nbsp&nbsp" name="Gravar"></td>
    </tr>
  </table>
  </form>
  </div>
  <?PHP } // Fecha if 
 require_once (__APP_.'view/MensagemGravando.php');
  ?>
    </body>
</html>

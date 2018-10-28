<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Imprimir parcela</title>
    </head>
    <body>
<?php
  
  $r = $this::mostraRelatorio();
  
  if ($row = ibase_fetch_object($r)) {
	if (isSet($_SESSION['cpf'])) {
?> 
  <form name='formulario' id='formulario' method='POST' action='RelacionaParcelasAssociado.php'>
     <input type='hidden' name='OperaRParc' value='I'>
     <input type='hidden' name='associado' value='<?php Print $row->ASSOCIADO;?>'>
     <input type='hidden' name='id' value='<?php Print $id;?>'>
     <input type="Submit" id="voltar"    name="voltar"    value="Voltar">
     <input type="button" onclick="imprimirDiv('idAreaImpressao', this);" value="Imprimir">
  </form>
  <?php } else { ?>
  <input type="button" onclick="JavaScript:history.back();" value="Voltar">
  <input type="button" onclick="imprimirDiv('idAreaImpressao', this);" value="Imprimir">
  <?php } ?>
  <div id='idAreaImpressao'>
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código da parcela:</td>
      <td class="campoCadastro"><?php print $row->ID;?></td>
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
      <td class="campoCadastro"><?php print $this::arrumaData($row->DATA_BAIXA);?></td>
      <td class="labelCadastro">Data do registro da baixa:</td>
      <td class="campoCadastro"><?php print $this::arrumaDataHora($row->DATA_REGISTRO_BAIXA);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor nominal:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::formataValorDecimal($row->VALOR_NOMINAL);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor do acréscimo:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::formataValorDecimal($row->VALOR_ACRESCIMO);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor do abatimento:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::formataValorDecimal($row->VALOR_ABATIMENTOS);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor baixado/Pago:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::formataValorDecimal($row->VALOR_BAIXADO);?></td>
    </tr>
  </table></DIV>
  </div>
  <?PHP } // Fecha if ($row = ibase_fetch_object($r))
  ?>
    </body>
</html>

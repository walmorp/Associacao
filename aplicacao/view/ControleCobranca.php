<?php 
 require_once ('defineVar.php');
 include (__APP_.'controller/ControleCadastro.php');
 $idTipoCobranca  = self::getCampo("idTipoCobranca");
 $idSituacaoBaixa = self::getCampo("idSituacaoBaixa");
 $idTitulo        = self::getCampo("idTitulo");
 $idAssociado     = self::getCampo("idAssociado");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Controle de parcelas</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Controle de parcelas</h1></div></center>

<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposCobranca(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código da parcela:</td>
      <td class="campoCadastro"><?php print $this::mostraCampoID($Dados['ID']);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Número do título:</td>
      <td class="campoCadastro"><select class="campo" name="idTitulo" id="idTitulo" onblur="ValidaCampo(this);"><?php $this::popularTitulo($this, $Dados['ID_TITULO']);?></select>
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Nome&nbspdo&nbspassociado:</td>
      <td class="campoCadastro"><select class="campo" name="idAssociado" id="idAssociado" <?php If ($this::getCampo("Opera") != "A") {print "disabled";}?> onblur="ValidaCampo(this);"><?php $this::popularAssociado($this, $Dados['ID_ASSOCIADO']);?></select>
        </td>
    </tr>
    <tr>
      <td class="labelCadastro">Tipo de cobrança:</td>
      <td class="campoCadastro"><select class="campo" name="idTipoCobranca" id="idTipoCobranca" onblur="ValidaCampo(this);"><?php $this::popularTipoCobranca($this, $Dados['ID_TIPO_COBRANCA']);?></select>
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Situação da baixa:</td>
      <td class="campoCadastro"><select class="campo" name="idSituacaoBaixa" id="idSituacaoBaixa" disabled onblur="ValidaCampo(this);"><?php $this::popularSituacaoBaixa($this, $Dados['ID_SITUACAO_BAIXA']);?></select>
        </td>
    </tr>
    <tr>
      <td class="labelCadastro">Data do registro:</td>
      <td class="campoCadastro"><input class="campo" name="dataRegistroParce" type="text" disabled onblur="FormataData(this);" id="dataRegistroParce" size="20" maxlength="20" value="<?php print $this::arrumaDataHora($Dados['DATA_REGISTRO_PARCELA']);?>" />
        </td>
      <td class="labelCadastro">Data do vencimento:</td>
      <td class="campoCadastro"><input class="campo" name="dataVencimento" type="text" onblur="FormataData(this);" id="dataVencimento" size="10" maxlength="10" value="<?php print $this::arrumaData($Dados['DATA_VENCIMENTO']);?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Data do baixa/Pagamento:</td>
      <td class="campoCadastro"><input class="campo" name="dataBaixa" type="text" onblur="FormataData(this);" id="dataBaixa" size="10" maxlength="10" value="<?php print $this::arrumaData($Dados['DATA_BAIXA']);?>" />
        <span class="campoObrigatorio"> </span></td>
      <td class="labelCadastro">Data do registro da baixa:</td>
      <td class="campoCadastro"><input class="campo" name="dataRegistroBaixa" type="text" disabled onblur="FormataData(this);" id="dataRegistroBaixa" size="20" maxlength="20" value="<?php print $this::arrumaDataHora($Dados['DATA_REGISTRO_BAIXA']);?>" />
        </td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor nominal:</td>
      <td class="campoCadastro"><input class="campo" name="valorNominal" type="text" onblur="FormataDecimal(this);" id="valorNominal" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($Dados['VALOR_NOMINAL']);?>" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Valor do acréscimo:</td>
      <td class="campoCadastro"><input class="campo" name="valorAcrescimo" type="text" onblur="FormataDecimal(this);" id="valorAcrescimo" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($Dados['VALOR_ACRESCIMO']);?>" />
        <span class="campoObrigatorio"> </span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Valor do abatimento:</td>
      <td class="campoCadastro"><input class="campo" name="valorAbatimento" type="text" onblur="FormataDecimal(this);" id="valorAbatimento" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($Dados['VALOR_ABATIMENTOS']);?>" />
        <span class="campoObrigatorio"> </span></td>
      <td class="labelCadastro">Valor baixado/Pago:</td>
      <td class="campoCadastro"><input class="campo" name="valorBaixado" type="text" onblur="FormataDecimal(this);" id="valorBaixado" size="14" maxlength="14" value="<?php print $this::formataValorDecimal($Dados['VALOR_BAIXADO']);?>" />
        <span class="campoObrigatorio"> </span></td>
    </tr>
    <tr><td colspan="4">
     <?php require_once (__APP_.'view/BotoesCadastro.php');?>
     <input class="botaoNovo"      type="button" id="varias"    name="varias"    value="Cadastra varias" onclick="JavaScript:AbrePagina('?class=CadastraParcelas');">
    </td></tr>
  </table>
</form>

<form id="cadastro" name="relaciona" method="post" enctype="multipart/form-data" action="">
  <input name="class" type="hidden" id="class" value="ControleCobranca" />
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Tipo de cobrança:</td>
      <td class="campoCadastro"><select class="campo" name="idTipoCobranca" id="idTipoCobranca"><?php $this::popularTipoCobranca($this, $idTipoCobranca);?></select></td>
      <td class="labelCadastro">Situação da baixa:</td>
      <td class="campoCadastro"><select class="campo" name="idSituacaoBaixa" id="idSituacaoBaixa"><?php $this::popularSituacaoBaixa($this, $idSituacaoBaixa);?></select></td>
      <td class="labelCadastro">Número do título:</td>
      <td class="campoCadastro"><select class="campo" name="idTitulo" id="idTitulo" ><?php $this::popularTitulo($this, $idTitulo);?></select></td>
      <td class="labelCadastro">Nome&nbspdo&nbspassociado:</td> 
      <td class="campoCadastro"><select class="campo" name="idAssociado" id="idAssociado" ><?php $this::popularAssociado($this, $idAssociado);?></select></td>
      <td class="campoCadastro"><input class="botaoAtualizar" type="Submit" id="atualizar" name="atualizar" value="Atualizar"></td>
    </tr>
  </table>
</form>

<?php $this::lista();?>
</body>
</html>

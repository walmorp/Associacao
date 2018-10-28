<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
 $id       = $this::getCampo("id");
 $Tabela   = "COBRANCA";
 if ($this::campoExiste("gravar")) {
    $Dados = $this::gravar();
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Cadastro de parcelas</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Cadastro de parcelas</h1></div></center>

<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposCadastraParcelas(); return false;">
  <table class="tabelaCadastro">
    <tr>
        <td class="tituloCadastro" colspan="4">Títulos</td>
    </tr>
    <tr>
      <td class="labelCadastro">Código inicial:</td>
      <td class="campoCadastro"><input class="campo" name="idTituloInicio" type="text" onblur="ValidaCampo(this);" id="idTituloInicio" size="10" maxlength="10" value="1" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Código final:</td>
      <td class="campoCadastro"><input class="campo" name="idTituloFinal" type="text" onblur="ValidaCampo(this);" id="idTituloFinal" size="10" maxlength="10" value="999999" />
        <span class="campoObrigatorio">*</span></td>
    <tr>
        <td class="tituloCadastro" colspan="4">Títulos / Associados</td>
    </tr>
    <tr>
      <td class="labelCadastro">Selecione os títulos:</td>
      <td class="campoCadastro" colspan="3"><select class="campo" name="idTitulo" id="idTitulo" onblur="ValidaCampo(this);"><?php $this::popularAssociadoCadParcelas($this);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
        <td class="tituloCadastro" colspan="4">Parcela</td>
    </tr>
    <tr>
      <td class="labelCadastro">Tipo de cobrança:</td>
      <td class="campoCadastro" colspan="3"><select class="campo" name="idTipoCobranca" id="idTipoCobranca" onblur="ValidaCampo(this);"><?php $this::popularTipoCobranca($this, $this::opcaoSelecione());?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Data do vencimento:</td>
      <td class="campoCadastro"><input class="campo" name="dataVencimento" type="text" onblur="FormataData(this);" id="dataVencimento" size="10" maxlength="10" value="" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Valor nominal:</td>
      <td class="campoCadastro"><input class="campo" name="valorNominal" type="text" onblur="FormataDecimal(this);" id="valorNominal" size="14" maxlength="14" value="" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr><td colspan="4">
     <span class="campoObrigatorio labelCampoObrigatorio"><b>* Campos obrigatórios</b><br></span>
     <input class="botaoGravar"    type="Submit" id="gravar"    name="gravar"    value="Gravar">
     <input class="botaoReiniciar" type="button" id="reiniciar" name="reiniciar" value="Reiniciar"     onclick="JavaScript:ResetCadastro(document.cadastro);">
     <input class="botaoLimpar"    type="button" id="limpar"    name="limpar"    value="Limpar"        onclick="JavaScript:LimparForm(document.cadastro);">
<!-- <input class="botaoNovo"      type="button" id="novo"      name="novo"      value="Novo cadastro" onclick="JavaScript:NovoCadastro(document.cadastro, 'gravar');"> -->
    </td></tr>
  </table>
</form>
<?php 
if ($this::getCampo("opera") != "C") {
    Print "<Script LANGUAGE='javascript'>setDisabed('gravar', false);</Script>";
} else { 
    Print "<Script LANGUAGE='javascript'>setDisabed('gravar', true);</Script>";
}
$this::getParcelaProcessadas();
 include (__APP_.'view/MensagemGravando.php');

?>
</body>
</html>

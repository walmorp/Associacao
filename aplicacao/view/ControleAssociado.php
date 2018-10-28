<?php 
 require_once ('defineVar.php');
 include (__APP_.'controller/ControleCadastro.php');
 $opSituacaoAssociado = $this::getCampo("opSA", "A");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Controle de associados</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Controle de associados <?php if ($opSituacaoAssociado=="I") {Print "inativos";} ?></h1></div></center>

<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposAssociado(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::mostraCampoID($Dados['ID']);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Nome&nbspdo&nbspassociado:</td>
      <td class="campoCadastro"><input class="campo" name="nome" type="text" onblur="ValidaCampo(this);" id="nome" size="50" maxlength="100" value="<?php print $Dados['NOME'];?>" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Gênero:</td>
      <td class="campoCadastro"><select class="campo" name="genero" id="genero" onblur="ValidaCampo(this);"><?php $this::popularGenero($this, $Dados['ID_GENERO']);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Endereço:</td>
      <td class="campoCadastro" colspan="3"><input class="campo" name="endereco" type="text" onblur="ValidaCampo(this);" id="endereco" size="85" maxlength="255" value="<?php print $Dados['ENDERECO'];?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Nascimento:</td>
      <td class="campoCadastro"><input class="campo" name="nascimento" type="text" onblur="FormataData(this);" id="nascimento" size="10" maxlength="10" value="<?php print $this::arrumaData($Dados['NASCIMENTO']);?>" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">CPF:</td>
      <td class="campoCadastro"><input class="campo" name="cpf" type="text" onblur="FormataCPF(this);" id="cpf" size="14" maxlength="14" value="<?php print $Dados['CPF'];?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Cidade:</td>
      <td class="campoCadastro"><select class="campo" name="cidade" id="cidade" onblur="ValidaCampo(this);"><?php $this::popularCidade($this, $Dados['ID_CIDADE']);?></select>
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Situação do associado:</td>
      <td class="campoCadastro"><select class="campo" name="situacao" id="situacao" onblur="ValidaCampo(this);"><?php $this::popularsituacaoAssociado($this, $Dados['ID_SITUACAO']);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr><td colspan="4">
     <?php require_once (__APP_.'view/BotoesCadastro.php');?>
     <input name="opSA" type="hidden" id="opSA" value="<?php print $opSituacaoAssociado;?>" />
    </td></tr>
  </table>
</form>
<?php $this::lista();?>
</body>
</html>

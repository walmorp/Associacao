<?php 
 require_once ('defineVar.php');
 include (__APP_.'controller/ControleCadastro.php');
 $opSituacaoTitulo = $this::getCampo("opST", "A");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Controle de títulos</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Controle de títulos <?php if ($opSituacaoTitulo=="I") {Print "inativos";} ?></h1></div></center>

<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposTitulos(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código do título:</td>
      <td class="campoCadastro" colspan="3"><?php print $this::mostraCampoID($Dados['ID']);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Número do título:</td>
      <td class="campoCadastro"><input class="campo" name="numeroTitulo" type="text" onblur="ValidaCampo(this);" id="numeroTitulo" size="25" maxlength="25" value="<?php print $Dados['NUMERO_TITULO'];?>" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Nome&nbspdo&nbspassociado:</td>
      <td class="campoCadastro">
          <select class="campo" name="idAssociado" id="idAssociado" onblur="ValidaCampo(this);" value="<?php print $Dados['ID_ASSOCIADO'];?>"><?php $this::popularAssociado($this, $Dados['ID_ASSOCIADO']);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Data da compra:</td>
      <td class="campoCadastro"><input class="campo" name="dataSocio" type="text" onblur="FormataData(this);" id="dataSocio" size="10" maxlength="10" value="<?php print $this::arrumaData($Dados['DATA_SOCIO']);?>" />
        <span class="campoObrigatorio">*</span></td>
      <td class="labelCadastro">Tipo do título:</td>
      <td class="campoCadastro">
        <select class="campo" name="idTipoTitulo" id="idTipoTitulo" onblur="ValidaCampo(this);" value="<?php print $Dados['ID_TIPO_TITULO'];?>"><?php $this::popularTipoTitulo($this, $Dados['ID_TIPO_TITULO']);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Situação do título:</td>
      <td class="campoCadastro" colspan="3"><select class="campo" name="idSituacaoTitulo" id="idSituacaoTitulo" onblur="ValidaCampo(this);" value="<?php print $Dados['ID_SITUACAO_TITULO'];?>"><?php $this::popularSituacaoTitulo($this, $Dados['ID_SITUACAO_TITULO']);?></select>
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr><td colspan="4">
     <?php require_once (__APP_.'view/BotoesCadastro.php');?>
     <input name="opST" type="hidden" id="opST" value="<?php print $opSituacaoTitulo;?>" />
    </td></tr>
  </table>
</form>
<?php $this::lista();?>
</body>
</html>

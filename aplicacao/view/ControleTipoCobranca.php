<?php 
 require_once ('defineVar.php');
 include (__APP_.'controller/ControleCadastro.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Tipos de cobrança</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Tipos de cobrança</h1></div></center>
    
<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposTipoCobranca(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código:</td>
      <td class="campoCadastro"><?php print $this::mostraCampoID($Dados['ID']);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Descrição:</td>
      <td class="campoCadastro"><input class="campo" name="descricao" type="text" onblur="ValidaCampo(this);" id="descricao" size="30" maxlength="30" value="<?php print $Dados['DESCRICAO'];?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Sigla:</td>
      <td class="campoCadastro"><input class="campo" name="sigla" type="text" onblur="ValidaCampo(this);" id="sigla" size="5" maxlength="2" value="<?php print $Dados['SIGLA'];?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr><td colspan="2">
     <?php require_once (__APP_.'view/BotoesCadastro.php');?>
    </td></tr>
  </table>
</form>
<?php 
 $this::lista();
?>
</body>
</html>
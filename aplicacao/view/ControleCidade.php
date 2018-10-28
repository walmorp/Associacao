<?php 
 require_once ('defineVar.php');
 include (__APP_.'controller/ControleCadastro.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Controle de cidades</title>
    </head>
<body>
<center><div><h1 class="tituloCadastro">Controle de cidades</h1></div></center>
    
<form id="cadastro" name="cadastro" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCamposCidade(); return false;">
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Código:</td>
      <td class="campoCadastro"><?php print $this::mostraCampoID($Dados['ID']);?></td>
    </tr>
    <tr>
      <td class="labelCadastro">Nome&nbspda&nbspcidade:</td>
      <td class="campoCadastro"><input class="campo" name="nome" type="text" onblur="ValidaCampo(this);" id="nome" size="70" maxlength="100" value="<?php print $Dados['NOME'];?>" />
        <span class="campoObrigatorio">*</span></td>
    </tr>
    <tr>
      <td class="labelCadastro">Estado:</td>
      <td class="campoCadastro"><select class="campo" name="siglaUF" id="siglaUF" onblur="ValidaCampo(this);" value="<?php print $Dados['SIGLA_UF'];?>">
        <option><?php print $this::OpcaoSelecione(); ?></option>
        <option value="AC" <?php if ($Dados['SIGLA_UF'] == "AC") { print " selected";}?>>AC</option>
        <option value="AL" <?php if ($Dados['SIGLA_UF'] == "AL") { print " selected";}?>>AL</option>
        <option value="AP" <?php if ($Dados['SIGLA_UF'] == "AP") { print " selected";}?>>AP</option>
        <option value="AM" <?php if ($Dados['SIGLA_UF'] == "AM") { print " selected";}?>>AM</option>
        <option value="BA" <?php if ($Dados['SIGLA_UF'] == "BA") { print " selected";}?>>BA</option>
        <option value="CE" <?php if ($Dados['SIGLA_UF'] == "CE") { print " selected";}?>>CE</option>
        <option value="ES" <?php if ($Dados['SIGLA_UF'] == "ES") { print " selected";}?>>ES</option>
        <option value="DF" <?php if ($Dados['SIGLA_UF'] == "DF") { print " selected";}?>>DF</option>
        <option value="MA" <?php if ($Dados['SIGLA_UF'] == "MA") { print " selected";}?>>MA</option>
        <option value="MT" <?php if ($Dados['SIGLA_UF'] == "MT") { print " selected";}?>>MT</option>
        <option value="MS" <?php if ($Dados['SIGLA_UF'] == "MS") { print " selected";}?>>MS</option>
        <option value="MG" <?php if ($Dados['SIGLA_UF'] == "MG") { print " selected";}?>>MG</option>
        <option value="PA" <?php if ($Dados['SIGLA_UF'] == "PA") { print " selected";}?>>PA</option>
        <option value="PB" <?php if ($Dados['SIGLA_UF'] == "PB") { print " selected";}?>>PB</option>
        <option value="PR" <?php if ($Dados['SIGLA_UF'] == "PR") { print " selected";}?>>PR</option>
        <option value="PE" <?php if ($Dados['SIGLA_UF'] == "PE") { print " selected";}?>>PE</option>
        <option value="PI" <?php if ($Dados['SIGLA_UF'] == "PI") { print " selected";}?>>PI</option>
        <option value="RJ" <?php if ($Dados['SIGLA_UF'] == "RJ") { print " selected";}?>>RJ</option>
        <option value="RN" <?php if ($Dados['SIGLA_UF'] == "RN") { print " selected";}?>>RN</option>
        <option value="RS" <?php if ($Dados['SIGLA_UF'] == "RS") { print " selected";}?>>RS</option>
        <option value="RO" <?php if ($Dados['SIGLA_UF'] == "RO") { print " selected";}?>>RO</option>
        <option value="RR" <?php if ($Dados['SIGLA_UF'] == "RR") { print " selected";}?>>RR</option>
        <option value="SC" <?php if ($Dados['SIGLA_UF'] == "SC") { print " selected";}?>>SC</option>
        <option value="SP" <?php if ($Dados['SIGLA_UF'] == "SP") { print " selected";}?>>SP</option>
        <option value="SE" <?php if ($Dados['SIGLA_UF'] == "SE") { print " selected";}?>>SE</option>
        <option value="TO" <?php if ($Dados['SIGLA_UF'] == "TO") { print " selected";}?>>TO</option>
          </select>
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
<?php 
  require_once ('defineVar.php');
  require_once (__APP_.'controller/ValidaSessao.php');

  $_SESSION['id']  = $this::getCampo("id");
  $idTipoCobranca  = $this::getCampo("idTipoCobranca");
  $idSituacaoBaixa = $this::getCampo("idSituacaoBaixa");

?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Relatório de cobrança</title>
    </head>
    <body>
    <center><div><h1 class="tituloCadastro">Relatório de cobrança - <?php print $this::getCampo("associado"); ?></h1></div></center>
<form id="cadastro" name="relaciona" method="post" enctype="multipart/form-data" action="">
  <input name="class"     type="hidden" id="class" value="RelacionaParcelasAssociado" />
  <input name="id" type="hidden" id="associado" value="<?php print $this::getCampo("id"); ?>" />
  <input name="associado" type="hidden" id="associado" value="<?php print $this::getCampo("associado"); ?>" />
  <table class="tabelaCadastro">
    <tr>
      <td class="labelCadastro">Tipo de cobrança:</td>
      <td class="campoCadastro"><select class="campo" name="idTipoCobranca" id="idTipoCobranca"><?php $this::popularTipoCobranca($this, $idTipoCobranca);?></select></td>
      <td class="labelCadastro">Situação da baixa:</td>
      <td class="campoCadastro"><select class="campo" name="idSituacaoBaixa" id="idSituacaoBaixa"><?php $this::popularSituacaoBaixa($this, $idSituacaoBaixa);?></select></td>
      <td class="campoCadastro"><input class="botaoAtualizar" type="Submit" id="atualizar" name="atualizar" value="Atualizar"></td>
    </tr>
  </table>
</form>
     <?php $this::mostraRelatorio();?> 
    </body>
</html>

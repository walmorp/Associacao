<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
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
        <title>Relatório gerencial</title>
    </head>
    <body>
     <center><div><h1 class="tituloCadastro">Relatório gerencial</h1></div></center>

<form id="cadastro" name="relaciona" method="post" enctype="multipart/form-data" action="">
  <input name="class" type="hidden" id="class" value="RelatorioGerencial" />
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

     <?php $this::mostraRelatorio();?> 
    </body>
</html>

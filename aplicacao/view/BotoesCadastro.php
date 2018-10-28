     <span class="campoObrigatorio labelCampoObrigatorio"><b>* Campos obrigatórios</b><br></span>
     <input class="botaoGravar"    type="Submit" id="gravar"    name="gravar"    value="Gravar">
     <input class="botaoReiniciar" type="button" id="reiniciar" name="reiniciar" value="Reiniciar"     onclick="JavaScript:ResetCadastro(document.cadastro);">
     <input class="botaoLimpar"    type="button" id="limpar"    name="limpar"    value="Limpar"        onclick="JavaScript:LimparForm(document.cadastro);">
     <input class="botaoNovo"      type="button" id="novo"      name="novo"      value="Novo cadastro" onclick="JavaScript:NovoCadastro(document.cadastro, 'gravar');">
<?php 
 if ($this::getCampo("opera") != "C") {
     Print "<Script LANGUAGE='javascript'>setDisabed('gravar', false);</Script>";
 } else { 
     Print "<Script LANGUAGE='javascript'>setDisabed('gravar', true);</Script>";
 }
 include (__APP_.'view/MensagemGravando.php');
?>

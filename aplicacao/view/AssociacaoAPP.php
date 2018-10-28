<?php
  @session_start();
  $_SESSION['id']="0";

  require_once ('defineVar.php');
  require_once (__APP_.'controller/Conexao.php');
  require_once (__APP_.'view/Mostra_Msg_Ret.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Associação recreativa</title>
    </head>
    <body onload="MostraTamanho();" onresize="MostraTamanho();">
        
        <table id='idJanela' width='1200' height='700' valign='center' align='center' border='1'>
          <tr class='bordaTopo' height='50px'>
              <td colspan="2"><center><h1 class='tituloAplicativo'>Associação Recreativa</h1></center></td>
          </tr>
          <tr class='bordaMenu'>
              <td width="180px" valign='center' align='center'>
                 <ul>
                  <li class='tituloMenu'>Menu</li>
                  <hr size='12'>
                  <li class='menu'><a id="Home"             href="?class=Home"                     target="iframeCentro" title="Mostra página inicial">Início</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Associado"        href="?class=ControleAssociado&opSA=A" target="iframeCentro" title="Inicia controle de associados">Controle de associados</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Titulo"           href="?class=ControleTitulo&opST=A"    target="iframeCentro" title="Inicia controle de títulos dos associados">Controle de títulos</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Cobranca"         href="?class=ControleCobranca"         target="iframeCentro" title="Inicia controle de parcelas">Controle de parcelas</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Cidade"           href="?class=ControleCidade"           target="iframeCentro" title="Inicia controle de cidades">Controle de cidades</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="TipoCobranca"     href="?class=ControleTipoCobranca"     target="iframeCentro" title="Inicia tipos de cobrança">Tipos de cobrança</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="AssociadoInativo" href="?class=ControleAssociado&opSA=I" target="iframeCentro" title="Inicia associados inativos">Associados inativos</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="TituloInativo"    href="?class=ControleTitulo&opST=I"    target="iframeCentro" title="Inicia associados inativos">Títulos inativos</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Gerencial"        href="?class=RelatorioGerencial"       target="iframeCentro" title="Inicia relatório gerencial">Relatório gerencial</a> </li>
                  <hr size='3'>
                  <li class='menu'><a id="Cobrador"         href="?class=RelatorioCobrador"        target="iframeCentro" title="Inicia relatório para cobrador">Relatório para cobrador</a> </li>
                  <hr size='3'>
                 </ul>
              </td>
              <td id='idJanelaNavegacao'><iframe id='iframeCentro' name='iframeCentro' width="100%" height='100%' valign='center' align='center' src="?class=Home"></iframe></td>
          </tr>
          <tr class='bordaAvisos' id='bordaAvisos' height='60px'></td>
              <td align='center'>&nbsp;&nbsp;Avisos: <?php $con = new Conexao();?>
              <td align='left'><output class='campoAviso1' id='campoAviso1' name='campoAviso1'><?php $con->mostraAviso(60, 180); ?></output>
                           <br><output class='campoAviso2' id='campoAviso2' name='campoAviso2'><?php $con->mostraAviso(180, 1800); ?></output>
              </td>
          </tr>
      </table>
<?php
  $ArqJS       = __APP_.'controller/MostraAvisos1.js';
  $VersaoArqJS = date("dmYGis", filemtime($ArqJS) );
  $ArqJS       = __HOST_APP_.'controller/MostraAvisos1.js';
?>
  <script>
   var worker1 = new Worker('<?php print "$ArqJS?$VersaoArqJS"; ?>');
   worker1.onmessage = function (event) {
     document.getElementById('campoAviso1').textContent = event.data;
   };
<?php
  $ArqJS       = __APP_.'controller/MostraAvisos2.js';
  $VersaoArqJS = date("dmYGis", filemtime($ArqJS) );
  $ArqJS       = __HOST_APP_.'controller/MostraAvisos2.js';
?>
   var worker2 = new Worker('<?php print "$ArqJS?$VersaoArqJS"; ?>');
   worker2.onmessage = function (event) {
     document.getElementById('campoAviso2').textContent = event.data;
   };
  </script>
<center><small><br>
 <span style="color: black">Este site é melhor visualizado com pelo menos 1024x768 de resolução (Recomendado 1280x800)</span><br>
 <span style="color: blue" id="Resulucao"><Script LANGUAGE="JavaScript">MostraTamanho();</Script></span>
</small></center>  
    </body>
</html>

<?php
  @session_start();
  @session_destroy();
  require_once ('defineVar.php');
  require_once ("Mostra_Msg_Ret.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Associação recreativa</title>
    </head>
 <body>
        
 <table width="100%" height='900px' valign='center' align='center' border='0'>
  <tr>
   <td valign='center' align='center'>
     <form id="login" name="login" method="post" enctype="multipart/form-data" action="" onsubmit="return ValidaCampos(); return false;">
        <table width="300px" height='200px' valign='center' align='center' border='1'>
          <tr class='bordaTopo' height='50px'>
            <td valign='center' align='center'><center><div><h1 class='tituloAplicativo'>Associação Recreativa</h1></div></center></td>
          </tr>
          <tr class='bordaTopo' height='150px'>
            <td valign='center' align='center'><br>
              ID:  <input name="id"    type="text"   class="campo" onblur="ValidaCampo(this);" id="id" size="9" maxlength="9" value="" /><br><br>
              CPF: <input name="cpf"   type="text"   class="campo" onblur="FormataCPF(this);" id="cpf" size="14" maxlength="14" value="" /><br><br>
                   <input name='class' type='hidden' value='LoginAPP'>
            </td>
          </tr>
          <tr class='bordaTopo' height='50px'>
            <td valign='center' align='center'><input class="botaoLogin" type="Submit" value="&nbsp&nbsp&nbsp&nbsp Entrar >> &nbsp&nbsp&nbsp&nbsp" name="Login"></td>
          </tr>
        </table>
      </form>
   </td>
  </tr>
 </table>
 </body>
</html>

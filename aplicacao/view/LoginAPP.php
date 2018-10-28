<?php
  require_once ('defineVar.php');
  
  @session_start();
  $_SESSION['id']=$this->getCampo("id");
  $_SESSION['cpf']=$this->getCampo("cpf");
  
  $id=$this->getCampo("id");
  $associado="";
  
  if (self::campoExiste("cpf")) {
      $associado=$this::execLogin();
  } else {
      Print "<Script LANGUAGE=\"javascript\">alert ('Acesso não autorizado!');</Script>";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Associação Recreativa</title>
    </head>
<body>
 <table width="100%" height='900px' valign='center' align='center' border='0'>
  <tr><td valign='center' align='center'>
  <form name='formulario' id='formulario' method='POST' action=''>
   <table width="500px" height='200px' valign='center' align='center' border='1'>
    <tr class='bordaTopo' height='50px'>
    <td><center><div><h1 class='tituloAplicativo'>Associação Recreativa</h1></div></center></td>
    </tr>
    <tr class='bordaTopo'>
    <td valign='center' align='center'>
     <input type='hidden' name='OperaRParc' value='I'>
     <input type='hidden' name='class'      value='RelacionaParcelasAssociado'>
     <input type='hidden' name='id'         value='<?php Print $id;?>'>
     <input type='hidden' name='associado'  value='<?php Print $associado;?>'>
     <h2 class='tituloAplicativo'>Associado: <a href='javascript:;' onclick='document.formulario.submit();'><?php Print $associado;?></a></h2>
    </td>
    </tr>
   </table>
  </form>
 </td></tr></table>
</body>
</html>

<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Relatório para cobrador</title>
    </head>
    <body>
     <center><div><h1 class="tituloCadastro">Relatório para cobrador</h1></div></center>
     <?php $this::mostraRelatorio();?> 
    </body>
</html>

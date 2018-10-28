<?php 
 require_once ('defineVar.php');
 require_once (__APP_.'controller/ValidaSessao.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
        <?php require_once (__APP_.'view/DefineEstilo.php');?>
        <title>Inicio</title>
    </head>
    <body>
     <center><h2>Parcelas em aberto</h2></center>
     <?php $this::mostraParcelasEmAberto();?> 
     <center><h2>Associados ativos</h2></center>
     <?php $this::mostraAssociadosAtivos();?> 
     <center><h2>Títulos ativos</h2></center>
     <?php $this::mostraTitulosAtivos();?> 
    </body>
</html>

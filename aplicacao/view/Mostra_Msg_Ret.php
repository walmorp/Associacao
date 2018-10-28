<?php 
require_once ('defineVar.php');
Function Mostra_Msg($Msg) { 
?> 
<Html> 
 <Head> 
  <Title><?php Print $Msg?></Title> 
    <?php require_once (__APP_.'view/DefineHeadMeta.php');?>
    <?php require_once (__APP_.'view/DefineEstilo.php');?>
    <title>Associação recreativa</title>
 </Head>
 <Body>

 <Table width="100%" height="100%" border="2" Align="center" cellpadding="0" cellspacing="0">
 <TR Align="center">
  <TD>
 
   <H2 Align="Center">- <?php Print $Msg?> -</H2>
   <P Align="Center"> <a href="JavaScript:history.back()"> Clique aqui para voltar </a> </P> 
   
  </TD>
 </TR>
 </Table>
   
 </Body> 
</Html> 
<?php  } ?>

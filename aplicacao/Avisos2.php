<?php
  require_once ('defineVar.php');
  session_start();
  if (!isSet($_SESSION['id'])) {
     $_SESSION['id']="0";
  }
  require_once (__APP_.'controller\Conexao.php');
  $con = new Conexao();
  $tempo1=$con->getCampo("t1", 180);
  $tempo2=$con->getCampo("t2", 1800);
  $con->mostraAviso($tempo1, $tempo2);
?>
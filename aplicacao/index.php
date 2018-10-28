<?php
  require_once ('defineVar.php');
  @session_start();
  if (!isset($_SESSION['id'])) {
      $_SESSION['id']="0";
  }
  
  require_once (__APP_.'controller/FuncaoSistema.php');
  
  $funcao = new FuncaoSistema();
  
  if ($funcao->campoExiste("class")) {
     $classe = $funcao->getCampo("class");
     $daoClasse = "Dao$classe";
     require_once (__APP_.'controller/'.$daoClasse.'.php');
     $obj = new $daoClasse();
     if ($funcao->campoExiste("acao")) {
        $metodo = $funcao->getCampo("acao");
        $obj->$metodo();
     } else {
        $obj->executaView();
     }
  } else {
      if ($funcao->campoExiste("app")) {
         require_once (__APP_.'view/AssociacaoAPP.php');
      } else {
         require_once (__APP_.'view/Login.php');
      }
  }
?>
<?php
require_once ('defineVar.php');
require_once (__APP_.'model/View.php');
interface Relatorio extends View {
 public function mostraRelatorio();
}
?>
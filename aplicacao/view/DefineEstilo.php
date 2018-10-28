<?php 
 require_once ('defineVar.php');
 $ArqEstilo    = __APP_.'controller/Estilo.css';
 $ArqJS        = __APP_.'controller/Scripts.js';
 $VersaoArq    = date("dmYGis", filemtime($ArqEstilo) );
 $VersaoArqJS  = date("dmYGis", filemtime($ArqJS) );
 $ArqEstilo    = __HOST_APP_.'controller/Estilo.css';
 $ArqJS        = __HOST_APP_.'controller/Scripts.js';
  
 Print "<style type='text/css'> @import '$ArqEstilo?$VersaoArq';</style>\n";
 Print "<script type='text/javascript' src='$ArqJS?$VersaoArqJS'></script>\n";
?>

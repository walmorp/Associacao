<?php
  $_SERVER['HTTP_HOST']='PHPInut';
  $_SERVER['HTTP_REFERER']='PHPInut';
  if ((!defined('__BD_'))       or ('__BD_' === ''))       {define ('__BD_', '127.0.0.1:C:/Apache24/htdocs/Associacao/dados/BANCOASSOCIACAO_TESTE.FDB');}
  if ((!defined('__TEST_'))     or ('__TEST_'     === '')) {define ('__TEST_', 'C:/Apache24/htdocs/Associacao/tests/');}
  if ((!defined('__APP_'))      or ('__APP_'      === '')) {define ('__APP_', 'C:/Apache24/htdocs/Associacao/aplicacao/');}
  if ((!defined('__HOST_APP_')) or ('__HOST_APP_' === '')) {define ('__HOST_APP_', 'http://localhost/Associacao/aplicacao/');}

  error_reporting(E_ALL | E_STRICT);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');  
?>
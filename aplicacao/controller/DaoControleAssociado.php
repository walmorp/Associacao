<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Cadastro.php');
require_once (__APP_.'model/Associado.php');
require_once (__APP_.'controller/Conexao.php');
 
class DaoControleAssociado extends Conexao implements Cadastro {
 const CLASSE_MODEL="Associado";

 public function getTabela() {
     return Associado::getTabela();
 }

 public function getClassModel() {
     return self::CLASSE_MODEL;
 }

 public function getClassView() {
     return "Controle".self::CLASSE_MODEL;
 }
 
 public function executaView() {
  require_once (__APP_.'view/'.self::getClassView().'.php');
  return true;
 }
  
 public function gravar() {
  $id = $this::getCampo("id", "0");
  if ($this::existe($id)) {
     return $this::altera();
  } else {
     return $this::insere();
  }
 }
  
 public function existe($id) {
  if ($this::ler($id)["ID"]=="") {
     return false;
  } else {
     return true;
  }
 }
  
 public function insere() {
  $id         = $this::retornaProximoID($this);
  $nome       = $this::getCampo("nome");
  $genero     = $this::getCampo("genero");
  $endereco   = $this::getCampo("endereco");
  $nascimento = $this::converteDataParaIB($this::getCampo("nascimento"));
  $cpf        = $this::getCampo("cpf");
  $cidade     = $this::getCampo("cidade");
  $situacao   = $this::getCampo("situacao");
  $sql = "INSERT INTO ".$this::getTabela()." (ID, NOME, ID_GENERO, ENDERECO, NASCIMENTO, CPF, ID_CIDADE, ID_SITUACAO)
                 VALUES ($id, '$nome', '$genero', '$endereco', $nascimento, '$cpf', '$cidade', '$situacao' )";
  $re = $this::query($sql);
  if (!$re) {
     return false;
  }
  return true;
 }
  
 public function altera() {
  $id         = $this::getCampo("id");
  $nome       = $this::getCampo("nome");
  $genero     = $this::getCampo("genero");
  $endereco   = $this::getCampo("endereco");
  $nascimento = $this::converteDataParaIB($this::getCampo("nascimento"));
  $cpf        = $this::getCampo("cpf");
  $cidade     = $this::getCampo("cidade");
  $situacao   = $this::getCampo("situacao");
  $sql = "UPDATE ".$this::getTabela()."
             SET NOME = '$nome', 
                 ID_GENERO = '$genero',
                 ENDERECO = '$endereco',
                 NASCIMENTO = $nascimento,
                 CPF = '$cpf',
                 ID_CIDADE = '$cidade',
                 ID_SITUACAO = '$situacao'
           WHERE ID = $id";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function apaga($id) {
  $sql = "DELETE FROM ".$this::getTabela()." WHERE (ID = $id);";
  $r = $this::query($sql);
  if (!$r) {
     return false;
  }
  return true;
 }
  
 public function ler($id) {
  $Dados = self::ConsultarDados($this, $id);
  return $Dados;
 }
  
 public function lista($filtro="") {
  $where="";
  if ($filtro!="") {
     $where=" AND A.NOME||' '||A.CPF LIKE '%$filtro%'";
  }
  $idSituacaoAssociado = " > 0"; 
  if ($this::getCampo("opSA", "A")=="I") {
     $idSituacaoAssociado = " <> 1";
  } else {
     $idSituacaoAssociado = " = 1"; 
  }

  $sql = "SELECT A.ID AS CODIGO, A.NOME AS ASSOCIADO, G.NOME AS GENERO, A.CPF, C.NOME ||'/'||C.SIGLA_UF AS CIDADE, S.SITUACAO
            FROM ASSOCIADO A LEFT JOIN GENERO G ON A.ID_GENERO = G.ID
                             LEFT JOIN CIDADE C ON A.ID_CIDADE = C.ID
                             LEFT JOIN SITUACAO_ASSOCIADO S ON A.ID_SITUACAO = S.ID
           WHERE A.ID_SITUACAO $idSituacaoAssociado
                 $where
           ORDER BY 2";
  $Opera = "A;D;C;P;";
  self::mostraTabelaBDConectado($this, $sql, $Opera, false);
  return true;
 }
}

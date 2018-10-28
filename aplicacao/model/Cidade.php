<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Tabela.php');
class Cidade implements Tabela {
 const TABELA="CIDADE";
 private $id;
 private $nome;
 private $sigla_uf;
 
 public static function getTabela() {
     return self::TABELA;
 }

 public function getId() {
     return $this->id;
 }

 public function getNome() {
     return $this->nome;
 }

 public function getSigla_uf() {
     return $this->sigla_uf;
 }

 public function setId($id) {
     $this->id = $id;
 }

 public function setNome($nome) {
     $this->nome = $nome;
 }

 public function setSigla_uf($sigla_uf) {
     $this->sigla_uf = $sigla_uf;
 }
 
}
?>
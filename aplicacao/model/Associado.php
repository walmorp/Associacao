<?php
require_once ('defineVar.php');
require_once (__APP_.'model/Tabela.php');
require_once (__APP_.'model/Cidade.php');
class Associado implements Tabela {
 const TABELA="ASSOCIADO";
 private $id;
 private $nome;
 private $id_genero;
 private $endereco;
 private $nascimento;
 private $cpf;
 private $Cidade;
 private $id_situacao;
 
 public static function getTabela() {
     return self::TABELA;
 }

 public function getId() {
     return $this->id;
 }

 public function getNome() {
     return $this->nome;
 }

 public function getId_genero() {
     return $this->id_genero;
 }

 public function getEndereco() {
     return $this->endereco;
 }

 public function getNascimento() {
     return $this->nascimento;
 }

 public function getCpf() {
     return $this->cpf;
 }

 public function getCidade() {
     return $this->Cidade;
 }

 public function getId_situacao() {
     return $this->id_situacao;
 }

 public function setId($id) {
     $this->id = $id;
 }

 public function setNome($nome) {
     $this->nome = $nome;
 }

 public function setId_genero($id_genero) {
     $this->id_genero = $id_genero;
 }

 public function setEndereco($endereco) {
     $this->endereco = $endereco;
 }

 public function setNascimento($nascimento) {
     $this->nascimento = $nascimento;
 }

 public function setCpf($cpf) {
     $this->cpf = $cpf;
 }

 public function setCidade($Cidade) {
     $this->Cidade = $Cidade;
 }

 public function setId_situacao($id_situacao) {
     $this->id_situacao = $id_situacao;
 }
}
?>